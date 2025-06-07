<?php
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_strict_mode', 1);
    session_start();
}

// ✅ Include config con costanti
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/functions.php';

// ✅ Connessione al database usando costanti da config.php
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Errore di connessione al database: ' . $e->getMessage());
}
