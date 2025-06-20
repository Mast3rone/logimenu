<?php
// public/save_settings.php

require_once '../src/init.php'; 
require_once '../src/controllers/SettingsController.php';

$controller = new SettingsController($pdo);
$controller->updateSettings();
