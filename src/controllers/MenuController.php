<?php
require_once __DIR__ . '/../models/MenuModel.php';
require_once __DIR__ . '/../helpers/lang.php';

class MenuController {
    private $pdo;
    private $model;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->model = new MenuModel($pdo);
    }

    public function showMenuPage($restaurant_id) {
        $t = load_lang();
        $menus = $this->model->getMenus($restaurant_id);
        require __DIR__ . '/../views/menu.php';
    }

    // AJAX endpoint for CRUD
    public function handleAjax($restaurant_id) {
        header('Content-Type: application/json');
        $action = $_POST['action'] ?? '';
        switch ($action) {
            case 'create':
                $name = trim($_POST['name'] ?? '');
                $result = $this->model->createMenu($restaurant_id, $name);
                echo json_encode($result);
                break;
            case 'delete':
                $menu_id = intval($_POST['menu_id'] ?? 0);
                $result = $this->model->deleteMenu($restaurant_id, $menu_id);
                echo json_encode($result);
                break;
            case 'toggle_active':
                $menu_id = intval($_POST['menu_id'] ?? 0);
                $result = $this->model->toggleMenuActive($restaurant_id, $menu_id);
                echo json_encode($result);
                break;
            // Add more actions as needed
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
        exit;
    }
}
