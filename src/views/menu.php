<?php
// $menus is provided by the controller
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>MenuNow - <?= $t['menu'] ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/plugins/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../public/assets/css/dashboard/main.min.css">
    <link rel="stylesheet" href="../public/assets/css/dashboard/custom.css">
    <link rel="stylesheet" href="../public/assets/css/dashboard.css">
    <style>
        .menu-card { border-radius: 16px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .menu-empty { text-align: center; padding: 60px 0; color: #888; }
        .menu-actions .btn { margin-right: 8px; }
        .menu-status { font-size: 0.9em; }
        .menu-header { display: flex; align-items: center; justify-content: space-between; }
    </style>
</head>
<body>
<div class="page-container">
    <div class="page-header">
        <nav class="navbar navbar-expand-lg d-flex justify-content-between">
            <div class="" id="navbarNav">
                <ul class="navbar-nav" id="leftNav">
                    <li class="nav-item">
                        <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                    </li>
                    <a target="_blank" href="https://www.menuviel.com/menu/<?= htmlspecialchars($linkslug) ?>" class="A-1">
                        <div class="DIV-6">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" class="svg-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" class="path-8"></path>
                            <path d="M9 15l6 -6" class="path-9"></path>
                            <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" class="path-10"></path>
                            <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" class="path-11"></path>
                            </svg>
                            <p class="P-0"><?= $t['preview'] ?></p>
                        </div>
                    </a>
                </ul>
            </div>
            <div class="DIV-2">
               <img alt="Logo" loading="lazy" width="108" height="20" decoding="async" data-nimg="1" src="https://menuviel.com/_next/static/media/menuviel-logo-navbar.f94f485e.png" class="IMG-0"/>
            </div>
            <div class="" id="headerNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu" aria-labelledby="searchDropDown">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        
                    </li>
                </ul>
            </div>
            <a target="_blank" href="https://menuviel.gitbook.io/menuviel-resources/welcome/what-is-menuviel" class="A-4">
               <div class="DIV-11">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="26" width="26" xmlns="http://www.w3.org/2000/svg" class="svg-5">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" class="path-16" ></path>
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" class="path-17"></path>
                        <path d="M12 16v.01" class="path-18"></path>
                        <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" class="path-19" ></path>
                    </svg>
                </div>
            </a>
            <div class="A-4">
                <div class="DIV-11 dropdown">
                    <a class="" href="#" id="languageDropdownToggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img alt="Language" width="22" height="22" src="<?= htmlspecialchars(getFlagUrl()) ?>" class="IMG-1" />
                    </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdownToggle">
                    <li><a class="dropdown-item" href="?lang=en"><img src="https://flagcdn.com/w40/gb.png" width="20" height="20" class="rounded-circle me-2"><?= $t['lang_en'] ?></a></li>
                    <li><a class="dropdown-item"href="?lang=de"><img src="https://flagcdn.com/w40/de.png" width="20" height="20" class="rounded-circle me-2"><?= $t['lang_de'] ?></a></li>
                    <li><a class="dropdown-item" href="?lang=it"><img src="https://flagcdn.com/w40/it.png" width="20" height="20" class="rounded-circle me-2"><?= $t['lang_it'] ?></a></li>
                </ul>
                </div>
            </div>
            <div class="A-4">
                <button class="btn p-0 border-0 bg-transparent" type="button" id="SettingsDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="DIV-11">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="26" width="26" xmlns="http://www.w3.org/2000/svg" class="svg-6">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" class="path-20"></path>
                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" class="path-21"></path>
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" class="path-22"></path>
                        </svg>
                    </div>
                </button>
                
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="SettingsDropdownToggle">
                    <li><a class="dropdown-item" href="#"><img src="../public/assets/imgs/account.png" width="20" height="20" class="rounded-circle me-2"><?= $t['accsettings'] ?></a></li>
                    <li><a class="dropdown-item" href="#"><img src="../public/assets/imgs/help.png" width="20" height="20" class="rounded-circle me-2"><?= $t['support'] ?></a></li>
                    <li><a class="dropdown-item" href="./logout.php"><img src="../public/assets/imgs/abmelden.png" width="20" height="20" class="rounded-circle me-2"><?= $t['logout'] ?></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="page-sidebar">
        <ul class="list-unstyled accordion-menu">
            <li class="sidebar-title">
                <?= $t['main_functions'] ?>
            </li>
            <li>
                <a href="./dashboard.php"><i data-feather="home"></i><?= $t['dashboard'] ?></a>
            </li>
            <li>
                <a href="./languages.php"><i data-feather="globe"></i><?= $t['language'] ?></a>
            </li>
            <li>
                <a href="./menu.php" style="color: #118ab2 !important;"><i style="color: #118ab2 !important;" data-feather="menu"></i><?= $t['menu'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="coffee"></i><?= $t['inventory'] ?></a>
            </li>
            <li>
                <a href="./qr-code.php" ><i  data-feather="code"></i><?= $t['qr_code'] ?></a>
            </li>
            <li>
                <a href="./settings.php"><i data-feather="tool"></i><?= $t['main_settings'] ?></a>
            </li>
            <li class="sidebar-title">
                <?= $t['pro_functions'] ?>
            </li>
            <li>
                <a href="profilo"><i data-feather="pen-tool"></i><?= $t['theme_settings'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="eye-off"></i><?= $t['menu_logo'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="award"></i><?= $t['banner'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="layout"></i><?= $t['popup'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="star"></i><?= $t['google_reviews'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="monitor"></i><?= $t['minigame'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="shopping-cart"></i><?= $t['delivery_link'] ?></a>
            </li>
            <li>
                <a href="./"><i data-feather="key"></i><?= $t['password_protection'] ?></a>
            </li>
        </ul>
    </div>
    <div class="page-content">
        <div class="main-wrapper">
            <div class="menu-header mb-4">
                <h2 class="fw-bold"><?= $t['menu'] ?></h2>
                <button class="btn btn-primary" id="addMenuBtn"><i class="fas fa-plus"></i> <?= $t['add'] ?></button>
            </div>
            <?php if (empty($menus)): ?>
                <div class="menu-empty">
                    <i class="fas fa-utensils fa-3x mb-3"></i>
                    <h4><?= $t['create_menu'] ?></h4>
                    <p><?= $t['menu_steps'] ?></p>
                    <button class="btn btn-success mt-3" id="addMenuBtn2"><i class="fas fa-plus"></i> <?= $t['add'] ?></button>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($menus as $menu): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card menu-card p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><?= htmlspecialchars($menu['name']) ?></h5>
                                    <span class="badge bg-<?= $menu['is_active'] ? 'success' : 'secondary' ?> menu-status">
                                        <?= $menu['is_active'] ? 'Attivo' : 'Disattivo' ?>
                                    </span>
                                </div>
                                <div class="mt-2 mb-2">
                                    <span class="me-3"><i class="fas fa-folder"></i> <?= $menu['categories_count'] ?> categorie</span>
                                    <span><i class="fas fa-utensils"></i> <?= $menu['items_count'] ?> articoli</span>
                                </div>
                                <div class="menu-actions mt-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="manageMenu(<?= $menu['id'] ?>)"><i class="fas fa-cog"></i> Gestisci</button>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="toggleMenuActive(<?= $menu['id'] ?>)"><?= $menu['is_active'] ? 'Disattiva' : 'Attiva' ?></button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteMenu(<?= $menu['id'] ?>)"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal for creating menu -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="menuForm">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">Crea nuovo menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="menuName" class="form-label">Nome menu</label>
          <input type="text" class="form-control" id="menuName" name="menuName" required maxlength="255">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <button type="submit" class="btn btn-primary">Crea</button>
      </div>
    </form>
  </div>
</div>

<script src="../public/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
$(function() {
    function reloadPage() { location.reload(); }

    $('#addMenuBtn, #addMenuBtn2').on('click', function() {
        $('#menuModal').modal('show');
    });

    $('#menuForm').on('submit', function(e) {
        e.preventDefault();
        var name = $('#menuName').val().trim();
        if (!name) return;
        $.post('ajax/menu.php', {action: 'create', name: name}, function(resp) {
            if (resp.success) reloadPage();
            else alert(resp.message || 'Errore');
        }, 'json');
    });

    window.deleteMenu = function(id) {
        if (!confirm('Eliminare questo menu?')) return;
        $.post('ajax/menu.php', {action: 'delete', menu_id: id}, function(resp) {
            if (resp.success) reloadPage();
            else alert(resp.message || 'Errore');
        }, 'json');
    };

    window.toggleMenuActive = function(id) {
        $.post('ajax/menu.php', {action: 'toggle_active', menu_id: id}, function(resp) {
            if (resp.success) reloadPage();
            else alert(resp.message || 'Errore');
        }, 'json');
    };

    window.manageMenu = function(id) {
        // Redirect to menu management page (to be implemented)
        window.location.href = 'menu_manage.php?menu_id=' + id;
    };
});
</script>
</body>
</html>