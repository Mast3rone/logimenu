<?php
require_once '../src/init.php';

//Lingua
require_once '../src/helpers/lang.php';
$t = load_lang();

if (!isset($_SESSION['jwt_token'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['locale_token'])) {
    header('Location: setup.php');
    exit;
}

$locale_token = $_SESSION['locale_token'] ?? null;

if (!$locale_token) {
    header("Location: errore.php#token");
    exit;
}

// Includi il controller
require_once '../src/controllers/LocalController.php';
$localController = new LocalController($pdo);

// Gestione salvataggio slug
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_slug'])) {
    $newSlug = trim($_POST['new_slug']);
    $result = $localController->updateSlug($locale_token, $newSlug);
    
    if ($result['success']) {
        $_SESSION['success_message'] = $t['slug_updated'];
        // Se è una richiesta AJAX, restituisci JSON
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
        // Altrimenti redirect normale
        header("Location: qr-code.php");
        exit;
    } else {
        // Se è una richiesta AJAX, restituisci JSON con errore
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
        $_SESSION['error_message'] = $result['message'] ?? $t['unknown_error'];
        header("Location: qr-code.php");
        exit;
    }
}



$stmt = $pdo->prepare("SELECT link_slug, name, last_slug_change FROM locali WHERE id = :token LIMIT 1");
$stmt->execute(['token' => $locale_token]);
$locale = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$locale) {
    die("Locale non trovato.");
}

$localeName = $locale['name'];
$linkslug = $locale['link_slug'];

// Calcola se il campo deve essere disabilitato
$slug_blocked = false;
$slug_blocked_until = '';
if (!empty($locale['last_slug_change'])) {
    $lastUpdate = new DateTime($locale['last_slug_change']);
    $now = new DateTime();
    $diff = $now->diff($lastUpdate);
    if ($diff->m < 1 && $diff->y == 0) {
        $slug_blocked = true;
        $slug_blocked_until = $lastUpdate->modify('+1 month')->format('d/m/Y');
    }
}

require_once '../src/views/qr-code.php';