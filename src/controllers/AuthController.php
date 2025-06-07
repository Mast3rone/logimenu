<?php
require_once '../src/helpers/ResponseHelper.php';
require_once '../src/models/UserModel.php';
require_once '../src/config/db.php'; // Connessione al DB

class AuthController {
    public function handleLoginRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($username) && !empty($password)) {
                $userModel = new UserModel();
                $token = $userModel->authenticate($username, $password);

                if ($token) {
                    $_SESSION['jwt_token'] = $token;
                    $_SESSION['user_email'] = $username; // Salviamo anche l'email o username

                    // Verifica se l'utente è già "Owner" di un locale
                    try {
                        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
                        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        ]);

                        $stmt = $pdo->prepare("SELECT id FROM locali WHERE Owner = :email LIMIT 1");
                        $stmt->execute(['email' => $username]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($result) {
                            $_SESSION['locale_token'] = $result['id'];
                            header('Location: dashboard.php');
                            exit;
                        } else {
                            header('Location: setup.php');
                            exit;
                        }
                    } catch (PDOException $e) {
                        ResponseHelper::error('Datenbankfehler: ' . $e->getMessage());
                    }

                } else {
                    $_SESSION['old_username'] = $username;
                    ResponseHelper::error('Ungültige Anmeldeinformationen. Versuchen Sie es erneut.');
                }
            } else {
                $_SESSION['old_username'] = $username;
                ResponseHelper::error('Geben Sie Ihren Benutzernamen und Ihr Passwort ein.');
            }
        }

        require_once '../src/views/login.php';
    }

    public function handleRegisterRequest() {
        require_once '../src/views/register.php';
    }
}
