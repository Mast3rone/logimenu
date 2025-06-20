<?php
// public/settings.php

require_once '../src/init.php';
require_once '../src/controllers/SettingsController.php';
require_once '../src/helpers/lang.php'; // Assicurati che lang helper sia caricato

// Crea un'istanza del controller e chiama il metodo per mostrare la pagina
$settingsController = new SettingsController($pdo);
$settingsController->showSettingsPage();