<?php
require_once '../init.php';

if (!isset($_SESSION['jwt_token']) || !isset($_SESSION['locale_token'])) {
    die(json_encode(['error' => 'Unauthorized']));
}

$restaurant_id = $_SESSION['locale_token'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'add':
        $lang_code = $_POST['language_code'] ?? '';
        if (empty($lang_code)) {
            die(json_encode(['error' => 'Invalid language code']));
        }

        // Check if we already have 5 active languages
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM restaurant_languages WHERE restaurant_id = ? AND is_active = 1");
        $stmt->execute([$restaurant_id]);
        if ($stmt->fetchColumn() >= 5) {
            die(json_encode(['error' => 'Maximum 5 languages allowed']));
        }

        // Check if language already exists
        $stmt = $pdo->prepare("SELECT id FROM restaurant_languages WHERE restaurant_id = ? AND language_code = ?");
        $stmt->execute([$restaurant_id, $lang_code]);
        if ($stmt->fetch()) {
            die(json_encode(['error' => 'Language already exists']));
        }

        $stmt = $pdo->prepare("INSERT INTO restaurant_languages (restaurant_id, language_code, is_active) VALUES (?, ?, 1)");
        $stmt->execute([$restaurant_id, $lang_code]);
        echo json_encode(['success' => true]);
        break;

    case 'delete':
        $lang_code = $_POST['language_code'] ?? '';
        $stmt = $pdo->prepare("DELETE FROM restaurant_languages WHERE restaurant_id = ? AND language_code = ? AND is_primary = 0");
        $stmt->execute([$restaurant_id, $lang_code]);
        echo json_encode(['success' => true]);
        break;

    case 'set_primary':
        $lang_code = $_POST['language_code'] ?? '';
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE restaurant_languages SET is_primary = 0 WHERE restaurant_id = ?");
            $stmt->execute([$restaurant_id]);
            
            $stmt = $pdo->prepare("UPDATE restaurant_languages SET is_primary = 1 WHERE restaurant_id = ? AND language_code = ?");
            $stmt->execute([$restaurant_id, $lang_code]);
            
            $pdo->commit();
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            $pdo->rollBack();
            die(json_encode(['error' => 'Database error']));
        }
        break;
}
