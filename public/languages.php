<?php
require_once '../src/init.php';

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

//Lingua
require_once '../src/helpers/lang.php';
$t = load_lang();

// Recupera i dati dal database
$stmt = $pdo->prepare("SELECT link_slug, name FROM locali WHERE id = :token LIMIT 1");
$stmt->execute(['token' => $locale_token]);
$locale = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$locale) {
    die("Locale non trovato.");
}

$localeName = $locale['name'];
$linkslug = $locale['link_slug'];

require_once '../src/views/languages.php';

