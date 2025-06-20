<?php
require_once '../../src/init.php';
require_once '../../src/controllers/MenuController.php';

if (!isset($_SESSION['jwt_token']) || !isset($_SESSION['locale_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$locale_token = $_SESSION['locale_token'];
$controller = new MenuController($pdo);
$controller->handleAjax($locale_token);
