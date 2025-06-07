<?php
require_once '../src/init.php';

// Assicura che l'utente sia loggato
if (!is_user_logged_in()) {
    ResponseHelper::sendError('Autenticazione richiesta', 401);
}

$action = $_GET['action'] ?? null;

// Endpoint per controllare la disponibilità dello slug
if ($action === 'check_slug') {
    $slug = $_GET['slug'] ?? null;
    $db = Database::getInstance();

    if (empty($slug) || !preg_match('/^[a-z0-9-]+$/', $slug)) {
        ResponseHelper::sendError(__('Lo slug può contenere solo lettere minuscole, numeri e trattini.'));
    }

    // Controlla se lo slug esiste per un altro utente
    $stmt = $db->prepare("SELECT id FROM locals WHERE slug = ? AND user_id != ?");
    $stmt->execute([$slug, get_user_id()]);

    if ($stmt->fetch()) {
        ResponseHelper::sendError(__('Slug già in uso'));
    } else {
        ResponseHelper::sendSuccess(['message' => __('Slug disponibile')]);
    }
} else {
    ResponseHelper::sendError('Azione non valida.', 400);
}