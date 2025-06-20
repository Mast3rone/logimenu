<?php
require_once '../src/init.php';
require_once '../src/controllers/MenuController.php';

if (!isset($_SESSION['jwt_token'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['locale_token'])) {
    header('Location: setup.php');
    exit;
}

$locale_token = $_SESSION['locale_token'];
$controller = new MenuController($pdo);
$controller->showMenuPage($locale_token);
