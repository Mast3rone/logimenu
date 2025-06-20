<?php

class UploadHandler {
    private $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    private $maxFileSize = 5242880; // 5MB
    private $uploadDir;
    private $restaurantId;

    public function __construct($restaurantId) {
        $this->restaurantId = $restaurantId;
        $this->uploadDir = dirname(dirname(__DIR__)) . '/public/uploads/' . $restaurantId;
        
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }

    public function handleUpload($file, $type) {
        try {
            $this->validateUpload($file);
            
            // Genera nome file sicuro
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = $type . '.' . $extension;
            $targetPath = $this->uploadDir . '/' . $filename;

            // Rimuovi il vecchio file se esiste
            $this->removeOldFile($type);

            // Sposta il file caricato
            if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
                throw new Exception('Errore durante il salvataggio del file');
            }

            // Restituisci il path relativo per il database
            return 'uploads/' . $this->restaurantId . '/' . $filename;

        } catch (Exception $e) {
            error_log('Upload error: ' . $e->getMessage());
            throw $e;
        }
    }

    private function validateUpload($file) {
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new Exception('Invalid file parameters');
        }

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new Exception('File troppo grande');
            default:
                throw new Exception('Errore upload sconosciuto');
        }

        if ($file['size'] > $this->maxFileSize) {
            throw new Exception('File troppo grande (max 5MB)');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!in_array($mimeType, $this->allowedTypes)) {
            throw new Exception('Tipo file non permesso');
        }

        // Verifica che sia realmente un'immagine
        if (!getimagesize($file['tmp_name'])) {
            throw new Exception('File non valido');
        }
    }

    private function removeOldFile($type) {
        $patterns = $this->uploadDir . '/' . $type . '.*';
        $existing = glob($patterns);
        foreach ($existing as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
