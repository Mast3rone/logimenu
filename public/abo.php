<?php
require_once '../src/init.php';
require_once '../src/controllers/SubscriptionController.php';

$subscriptionController = new SubscriptionController();
$subscriptionController->handleSubscriptionRequest();