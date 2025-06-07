<?php
require_once '../src/init.php';
require_once '../src/controllers/AuthController.php';

// Controlla se l'utente è già loggato
if (isset($_SESSION['jwt_token'])) {
    header('Location: dashboard.php');
    exit;
}

$authController = new AuthController();
$authController->handleLoginRequest();


