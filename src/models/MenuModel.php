<?php
class MenuModel {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getMenus($restaurant_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM menus WHERE restaurant_id = ? ORDER BY id ASC");
        $stmt->execute([$restaurant_id]);
        $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // For each menu, count categories and items
        foreach ($menus as &$menu) {
            $stmtCat = $this->pdo->prepare("SELECT id FROM menu_categories WHERE menu_id = ?");
            $stmtCat->execute([$menu['id']]);
            $categories = $stmtCat->fetchAll(PDO::FETCH_COLUMN);
            $menu['categories_count'] = count($categories);

            if ($categories) {
                $in = str_repeat('?,', count($categories) - 1) . '?';
                $stmtItems = $this->pdo->prepare("SELECT COUNT(*) FROM menu_items WHERE category_id IN ($in)");
                $stmtItems->execute($categories);
                $menu['items_count'] = $stmtItems->fetchColumn();
            } else {
                $menu['items_count'] = 0;
            }
        }
        return $menus;
    }

    public function createMenu($restaurant_id, $name) {
        // Limit to 3 menus
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM menus WHERE restaurant_id = ?");
        $stmt->execute([$restaurant_id]);
        if ($stmt->fetchColumn() >= 3) {
            return ['success' => false, 'message' => 'Limite massimo di 3 menu raggiunto'];
        }
        $stmt = $this->pdo->prepare("INSERT INTO menus (restaurant_id, name) VALUES (?, ?)");
        $ok = $stmt->execute([$restaurant_id, $name]);
        return $ok ? ['success' => true, 'menu_id' => $this->pdo->lastInsertId()] : ['success' => false, 'message' => 'Errore creazione menu'];
    }

    public function deleteMenu($restaurant_id, $menu_id) {
        $stmt = $this->pdo->prepare("DELETE FROM menus WHERE id = ? AND restaurant_id = ?");
        $ok = $stmt->execute([$menu_id, $restaurant_id]);
        return $ok ? ['success' => true] : ['success' => false, 'message' => 'Errore eliminazione menu'];
    }

    public function toggleMenuActive($restaurant_id, $menu_id) {
        $stmt = $this->pdo->prepare("UPDATE menus SET is_active = NOT is_active WHERE id = ? AND restaurant_id = ?");
        $ok = $stmt->execute([$menu_id, $restaurant_id]);
        return $ok ? ['success' => true] : ['success' => false, 'message' => 'Errore aggiornamento stato menu'];
    }
}
