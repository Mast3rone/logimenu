<?php
class SubscriptionController {
    public function handleSubscriptionRequest() {
        if (!isset($_SESSION['jwt_token'])) {
            header('Location: login.php');
            exit;
        }

        $subscriptionData = $this->getSubscriptionData();
        require_once '../src/views/subscription.php';
    }

    private function getSubscriptionData() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/menunow/wp-json/custom/v1/edd-purchases');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['jwt_token']
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 200) {
            return json_decode($response, true);
        }

        return null;
    }
}