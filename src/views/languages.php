<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuNow - Dashboard">
        <meta name="keywords" content="menunow,menunowdashboard">
        <meta name="author" content="Mast3r">

        <title>MenuNow - <?= $t['page_title_languages'] ?></title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css">
        <link rel="shortcut icon" href="<?php echo $base_path; ?>assets/images/loona.ico">

        <link href="../public/assets/css/dashboard/main.min.css" rel="stylesheet">
        <link href="../public/assets/css/dashboard/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/css/dashboard.css">
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
                        <a style="color: #118ab2 !important;" href="./languages.php"><i style="color: #118ab2 !important;" data-feather="globe"></i><?= $t['language'] ?></a>
                    </li>
                    <li>
                        <a href="./"><i data-feather="menu"></i><?= $t['menu'] ?></a>
                    </li>
                    <li>
                        <a href="./"><i data-feather="coffee"></i><?= $t['inventory'] ?></a>
                    </li>
                    <li>
                        <a href="./qr-code.php"><i data-feather="code"></i><?= $t['qr_code'] ?></a>
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
                    <div class="language-card">
                        <div class="language-header2">
                            <div class="language-header-left2">
                                <div class="language-icon">
                                    <i class="fas fa-language"></i>
                                </div>
                                <div>
                                    <h1 class="language-title"><?= $t['page_title_languages'] ?></h1>
                                </div>
                            </div>
                            
                            <button class="add-language-icon" onclick="openAddLanguageModal()" title="<?= $t['add_new_language_title'] ?>">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        
                        <div class="available-languages">
                            <h2 class="section-title"><?= $t['available_languages_title'] ?></h2>
                            <p class="section-subtitle"><?= $t['available_languages_subtitle'] ?></p>
                            
                            <div class="language-item">
                                <img src="https://flagcdn.com/w40/gb.png" alt="English" class="flag-img">
                                <span class="language-name"><?= $t['lang_en_full'] ?></span>
                                <button class="make-primary-btn"><?= $t['make_primary'] ?></button>
                                <button class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <div class="language-item">
                                <img src="https://flagcdn.com/w40/it.png" alt="Italian" class="flag-img">
                                <span class="language-name"><?= $t['lang_it_full'] ?></span>
                                <span class="primary-badge"><?= $t['primary'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLanguageModalLabel"><?= $t['modal_add_language_title'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-subtitle"><?= $t['modal_add_language_subtitle'] ?></p>
                        <select class="form-select" id="languageSelect">
                            <option value=""><?= $t['modal_select_placeholder'] ?></option>
                            <option value="de"><?= $t['lang_de_full'] ?></option>
                            <option value="fr"><?= $t['lang_fr_full'] ?></option>
                            <option value="es"><?= $t['lang_es_full'] ?></option>
                            <option value="pt"><?= $t['lang_pt_full'] ?></option>
                            <option value="tr"><?= $t['lang_tr_full'] ?></option>
                            <option value="ru"><?= $t['lang_ru_full'] ?></option>
                            <option value="ar"><?= $t['lang_ar_full'] ?></option>
                        </select>
                        <button type="button" class="btn btn-primary w-100" onclick="addLanguage()"><?= $t['modal_add_button'] ?></button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../public/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../public/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../public/assets/js/main.min.js"></script>
        <script src="../public/assets/js/script.js"></script>
        
        <script>
            // Feather icons replacement with FontAwesome
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Dashboard loaded successfully');
            });
            
            function openAddLanguageModal() {
                const modal = new bootstrap.Modal(document.getElementById('addLanguageModal'));
                modal.show();
            }
            
            function addLanguage() {
                const select = document.getElementById('languageSelect');
                const selectedValue = select.value;
                const selectedText = select.options[select.selectedIndex].text;
                
                if (selectedValue) {
                    alert('<?= $t['language_added_alert'] ?>: ' + selectedText);
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addLanguageModal'));
                    modal.hide();
                    select.value = '';
                } else {
                    alert('<?= $t['please_select_language_alert'] ?>');
                }
            }
        </script>
    </body>
</html>