<?php
require_once '../src/init.php'; // Questo avvia la sessione e prepara $pdo
require_once '../src/controllers/LocalController.php';

// Verifica autenticazione
if (!isset($_SESSION['jwt_token'])) {
    header('Location: login.php');
    exit;
}

// Se il setup è già stato completato
if (isset($_SESSION['locale_token'])) {
    header('Location: dashboard.php');
    exit;
}

// Verifica presenza email
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

//Lingua
require_once '../src/helpers/lang.php';
$t = load_lang();

// Inizializza il controller passando la connessione PDO
$localController = new LocalController($pdo);

// Se è una richiesta POST (invio del form)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['place_name'] ?? '');
    $slug = trim($_POST['url_slug'] ?? '');
    $currency = trim($_POST['currency'] ?? '');
    $language = trim($_POST['main_language'] ?? '');

    // Controlla che tutti i campi siano compilati
    if (!$name || !$slug || !$currency || !$language) {
        die('Compila tutti i campi obbligatori.');
    }

    // Crea il locale
    $id = $localController->createLocation($name, $slug, $currency, $language, $_SESSION['user_email']);

    if ($id) {
        $_SESSION['locale_token'] = $id;
        header('Location: dashboard.php');
        exit;
    } else {
        die('Errore durante la creazione del locale.');
    }
}

// Se GET, mostra la view con il form
require_once '../src/views/setup.php';
