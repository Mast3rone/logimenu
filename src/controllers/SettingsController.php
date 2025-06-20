<?php
// src/controllers/SettingsController.php

require_once __DIR__ . '/../models/SettingsModel.php';
require_once __DIR__ . '/../helpers/lang.php';
require_once __DIR__ . '/../helpers/UploadHandler.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class SettingsController {
    private $pdo;
    private $settingsModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->settingsModel = new SettingsModel($pdo);
    }

    public function showSettingsPage() {
        if (!isset($_SESSION['jwt_token'])) {
            header('Location: login.php');
            exit;
        }
        if (!isset($_SESSION['locale_token'])) {
            header('Location: setup.php');
            exit;
        }

        $locale_token = $_SESSION['locale_token'];
        
        // Add base path
        $base_path = '/menucloud/public/';
        
        // Carica lingua
        $t = load_lang();
        
        // Recupera tutti i dati delle impostazioni tramite il model
        $settings = $this->settingsModel->getSettings($locale_token);

        // Recupera il link_slug per la preview
        $stmt = $this->pdo->prepare("SELECT link_slug FROM locali WHERE id = :token LIMIT 1");
        $stmt->execute(['token' => $locale_token]);
        $locale = $stmt->fetch(PDO::FETCH_ASSOC);
        $linkslug = $locale['link_slug'] ?? '';

        // Includi la vista e passale i dati
        require_once __DIR__ . '/../views/settings.php';
    }

    public function updateSettings() {
        header('Content-Type: application/json');
        $t = load_lang();
        
        if (!isset($_SESSION['locale_token'])) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => $t['invalid_session']]);
            exit;
        }

        $locale_token = $_SESSION['locale_token'];

        try {
            $updates = [];
            
            // Handle file uploads if present
            if (!empty($_FILES)) {
                $uploadHandler = new UploadHandler($locale_token);
                
                if (isset($_FILES['logo']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $logoPath = $uploadHandler->handleUpload($_FILES['logo'], 'logo');
                    $updates['logo_url'] = $logoPath;
                }

                if (isset($_FILES['banner']) && $_FILES['banner']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $bannerPath = $uploadHandler->handleUpload($_FILES['banner'], 'banner');
                    $updates['cover_url'] = $bannerPath;
                }

                // Update image paths in database
                if (!empty($updates)) {
                    $sql = "UPDATE locali SET ";
                    $setParts = [];
                    $params = [];
                    foreach ($updates as $key => $value) {
                        $setParts[] = "$key = :$key";
                        $params[$key] = $value;
                    }
                    $sql .= implode(', ', $setParts);
                    $sql .= " WHERE id = :id";
                    $params['id'] = $locale_token;

                    $stmt = $this->pdo->prepare($sql);
                    $stmt->execute($params);
                }
            }

            // Handle other form data
            $formData = [];
            
            // Get JSON data from request body for non-file data
            $jsonData = file_get_contents('php://input');
            if (!empty($jsonData)) {
                $formData = json_decode($jsonData, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception('Invalid JSON data');
                }
            } else {
                // Fallback to POST data if no JSON data
                $formData = $_POST;
            }

            // Save settings
            if (!empty($formData)) {
                $result = $this->settingsModel->saveSettings($locale_token, $formData);
                if (!$result) {
                    throw new Exception('Failed to save settings');
                }
            }

            echo json_encode([
                'status' => 'success',
                'message' => $t['settings_saved_success'],
                'updates' => $updates
            ]);

        } catch (Exception $e) {
            error_log('Settings update error: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $t['settings_saved_error'] . ': ' . $e->getMessage()
            ]);
        }
    }
}