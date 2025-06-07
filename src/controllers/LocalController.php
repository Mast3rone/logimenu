<?php
require_once __DIR__ . '/../init.php'; // Questo carica anche config e crea $pdo

class LocalController {
    private $pdo;

    // Usa la connessione globale creata in init.php
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // 🔢 Genera ID unico a 6 cifre
    private function generateUniqueId() {
        do {
            $id = random_int(100000, 999999);
            $stmt = $this->pdo->prepare("SELECT id FROM locali WHERE id = ?");
            $stmt->execute([$id]);
        } while ($stmt->fetch());
        return $id;
    }

    // 🏪 Crea un nuovo locale
    public function createLocation($name, $slug, $currency, $language, $ownerEmail) {
        try {
            $id = $this->generateUniqueId();

            $stmt = $this->pdo->prepare("
                INSERT INTO locali (id, name, link_slug, currency, main_language, owner)
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            $result = $stmt->execute([$id, $name, $slug, $currency, $language, $ownerEmail]);

            if ($result) {
                return $id;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("Errore inserimento locale: " . implode(', ', $errorInfo));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Exception in createLocation: " . $e->getMessage());
            return false;
        }
    }
    
public function updateSlug($localeId, $newSlug) {
    try {
        // Verifica se lo slug contiene solo caratteri validi (lettere, numeri, trattini)
        if (!preg_match('/^[a-z0-9-]+$/i', $newSlug)) {
            return [
                'success' => false,
                'message' => 'Lo slug può contenere solo lettere, numeri e trattini'
            ];
        }

        // Recupera la data dell'ultima modifica
        $stmt = $this->pdo->prepare("SELECT id, name, last_slug_change, link_slug FROM locali WHERE id = ?");
        $stmt->execute([$localeId]);
        $locale = $stmt->fetch();

        if (!$locale) {
            return [
                'success' => false,
                'message' => 'Locale non trovato'
            ];
        }

        // Se lo slug è già quello richiesto, nessuna modifica
        if ($locale['link_slug'] === $newSlug) {
            return [
                'success' => false,
                'message' => 'Lo slug è già impostato su questo valore'
            ];
        }

        // Controlla se è passato almeno un mese dall'ultima modifica
        if (!empty($locale['last_slug_change'])) {
            $lastUpdate = new DateTime($locale['last_slug_change']);
            $now = new DateTime();
            $diff = $now->diff($lastUpdate);
            if ($diff->m < 1 && $diff->y == 0) {
                return [
                    'success' => false,
                    'message' => 'Puoi cambiare lo slug solo una volta al mese. Prossima modifica disponibile dal: ' . $lastUpdate->modify('+1 month')->format('d/m/Y')
                ];
            }
        }

        // Verifica se lo slug esiste già
        $stmt = $this->pdo->prepare("SELECT id, name FROM locali WHERE link_slug = ? AND id != ?");
        $stmt->execute([$newSlug, $localeId]);
        if ($existingLocale = $stmt->fetch()) {
            return [
                'success' => false,
                'message' => 'Questo slug è già in uso dal locale: ' . htmlspecialchars($existingLocale['name'])
            ];
        }

        // Aggiorna lo slug e la data di modifica
        $updateStmt = $this->pdo->prepare("UPDATE locali SET link_slug = ?, last_slug_change = NOW() WHERE id = ?");
        $result = $updateStmt->execute([$newSlug, $localeId]);

        if ($result && $updateStmt->rowCount() > 0) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Nessun cambiamento effettuato'];
        }
    } catch (PDOException $e) {
        error_log("Exception in updateSlug: " . $e->getMessage());
        return ['success' => false, 'message' => 'Errore del database: ' . $e->getMessage()];
    }
}
}
