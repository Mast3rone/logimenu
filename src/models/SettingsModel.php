<?php
// src/models/SettingsModel.php

class SettingsModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getSettings($restaurant_id) {
        $settings = [];

        // Recupera dati da 'locali'
        $stmt = $this->pdo->prepare("SELECT name, currency, phone, address, is_active, logo_url, cover_url, second_hours_enabled FROM locali WHERE id = :id");
        $stmt->execute(['id' => $restaurant_id]);
        $settings['locali'] = $stmt->fetch(PDO::FETCH_ASSOC);

        // Recupera dati da 'wifi_info'
        $stmt = $this->pdo->prepare("SELECT wifi_name, wifi_password FROM wifi_info WHERE restaurant_id = :id");
        $stmt->execute(['id' => $restaurant_id]);
        $settings['wifi'] = $stmt->fetch(PDO::FETCH_ASSOC) ?: ['wifi_name' => '', 'wifi_password' => ''];

        // Recupera dati da 'social_links'
        $stmt = $this->pdo->prepare("SELECT type, url FROM social_links WHERE restaurant_id = :id");
        $stmt->execute(['id' => $restaurant_id]);
        $socials_from_db = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
        $settings['socials'] = [
            'instagram' => $socials_from_db['instagram'] ?? '',
            'facebook' => $socials_from_db['facebook'] ?? ''
        ];

        // Orari di apertura
        $default_hours = [];
        for ($i = 0; $i <= 6; $i++) {
            $default_hours[$i] = [
                'day_of_week' => $i,
                'open_time' => '11:00:00',
                'close_time' => '14:00:00',
                'second_open_time' => '18:00:00',
                'second_close_time' => '23:00:00',
                'is_open' => 0
            ];
        }

        $stmt_hours = $this->pdo->prepare("SELECT day_of_week, open_time, close_time, second_open_time, second_close_time, is_open FROM opening_hours WHERE restaurant_id = :id");
        $stmt_hours->execute(['id' => $restaurant_id]);
        $db_hours = $stmt_hours->fetchAll(PDO::FETCH_ASSOC);

        foreach ($db_hours as $db_hour) {
            $day_index = $db_hour['day_of_week'];
            if (isset($default_hours[$day_index])) {
                $default_hours[$day_index] = $db_hour;
            }
        }
        $settings['hours'] = $default_hours;

        return $settings;
    }

    public function saveSettings($restaurant_id, $data) {
        $this->pdo->beginTransaction();
        try {
            // Aggiorna 'locali'
            $sqlLocali = "UPDATE locali SET 
                name = :name, 
                currency = :currency, 
                phone = :phone, 
                address = :address, 
                is_active = :is_active, 
                second_hours_enabled = :second_hours_enabled
                WHERE id = :id";
            $stmt = $this->pdo->prepare($sqlLocali);
            $stmt->execute([
                'name' => $data['restaurantName'],
                'currency' => $data['currency'],
                'phone' => $data['phone'] ?? '',
                'address' => $data['address'] ?? '',
                'is_active' => !empty($data['menuActive']) ? 1 : 0,
                'second_hours_enabled' => !empty($data['second_hours_enabled']) ? 1 : 0,
                'id' => $restaurant_id
            ]);

            // WIFI
            $stmt = $this->pdo->prepare("SELECT id FROM wifi_info WHERE restaurant_id = :id");
            $stmt->execute(['id' => $restaurant_id]);
            if ($stmt->fetch()) {
                $sqlWifi = "UPDATE wifi_info SET wifi_name = :name, wifi_password = :pass WHERE restaurant_id = :id";
            } else {
                $sqlWifi = "INSERT INTO wifi_info (restaurant_id, wifi_name, wifi_password) VALUES (:id, :name, :pass)";
            }
            $stmtWifi = $this->pdo->prepare($sqlWifi);
            $stmtWifi->execute([
                'id' => $restaurant_id,
                'name' => $data['wifiName'] ?? '',
                'pass' => $data['wifiPassword'] ?? ''
            ]);

            // SOCIAL
            foreach (['instagram', 'facebook'] as $type) {
                $url = $data[$type] ?? null;
                if (!empty($url)) {
                    $stmt = $this->pdo->prepare("SELECT id FROM social_links WHERE restaurant_id = :id AND type = :type");
                    $stmt->execute(['id' => $restaurant_id, 'type' => $type]);
                    if ($stmt->fetch()) {
                        $sqlSocial = "UPDATE social_links SET url = :url WHERE restaurant_id = :id AND type = :type";
                    } else {
                        $sqlSocial = "INSERT INTO social_links (restaurant_id, type, url) VALUES (:id, :type, :url)";
                    }
                    $stmtSocial = $this->pdo->prepare($sqlSocial);
                    $stmtSocial->execute(['id' => $restaurant_id, 'type' => $type, 'url' => $url]);
                } else {
                    $stmtDelSocial = $this->pdo->prepare("DELETE FROM social_links WHERE restaurant_id = :id AND type = :type");
                    $stmtDelSocial->execute(['id' => $restaurant_id, 'type' => $type]);
                }
            }

            // OPENING HOURS
            foreach ($data['openingHours'] as $day) {
                $stmt = $this->pdo->prepare("SELECT id FROM opening_hours WHERE restaurant_id = :id AND day_of_week = :day");
                $stmt->execute(['id' => $restaurant_id, 'day' => $day['day']]);
                if ($stmt->fetch()) {
                    $sqlHours = "UPDATE opening_hours SET 
                        open_time = :open, 
                        close_time = :close, 
                        second_open_time = :second_open, 
                        second_close_time = :second_close, 
                        is_open = :is_open 
                        WHERE restaurant_id = :id AND day_of_week = :day";
                } else {
                    $sqlHours = "INSERT INTO opening_hours 
                        (restaurant_id, day_of_week, open_time, close_time, second_open_time, second_close_time, is_open) 
                        VALUES (:id, :day, :open, :close, :second_open, :second_close, :is_open)";
                }
                $stmtHours = $this->pdo->prepare($sqlHours);
                $stmtHours->execute([
                    'id' => $restaurant_id,
                    'day' => $day['day'],
                    'open' => !empty($day['open']) ? $day['open'] : null,
                    'close' => !empty($day['close']) ? $day['close'] : null,
                    'second_open' => !empty($day['second_open']) ? $day['second_open'] : null,
                    'second_close' => !empty($day['second_close']) ? $day['second_close'] : null,
                    'is_open' => !empty($day['isOpen']) ? 1 : 0
                ]);
            }

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            error_log("Errore in saveSettings: " . $e->getMessage());
            return false;
        }
    }
}