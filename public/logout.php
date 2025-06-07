<?php
require_once '../src/init.php';

// Distrugge la sessione in modo sicuro
session_unset();
session_destroy();
header('Location: login.php');
exit;
