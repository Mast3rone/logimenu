<?php
// Dati passati dal SettingsController
$locali = $settings['locali'];
$wifi = $settings['wifi'];
$socials = $settings['socials'];
$hours = $settings['hours'];

$days_map = [
    $t['monday'], $t['tuesday'], $t['wednesday'], $t['thursday'], $t['friday'], $t['saturday'], $t['sunday']
];
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MenuNow - <?= $t['page_title_setting'] ?></title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css">
        <link rel="shortcut icon" href="<?= $base_path ?>assets/images/loona.ico">

        <link href="../public/assets/css/dashboard/main.min.css" rel="stylesheet">
        <link href="../public/assets/css/dashboard/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/css/dashboard.css">
        <style>
            /* I tuoi stili CSS rimangono invariati */
             :root {
                 --primary-color: #118ab2;
                 --secondary-color: #06d6a0;
                 --background-color: #f8f9fa;
                 --card-background: #ffffff;
                 --text-primary: #2c3e50;
                 --text-secondary: #6c757d;
                 --border-color: #e9ecef;
             }

             .settings-header {
                 display: flex;
                 align-items: center;
                 margin-bottom: 30px;
                 padding-bottom: 20px;
                 border-bottom: 2px solid var(--border-color);
             }

             .settings-icon {
                 width: 50px;
                 height: 50px;
                 background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                 border-radius: 12px;
                 display: flex;
                 align-items: center;
                 justify-content: center;
                 margin-right: 20px;
             }

             .settings-icon i {
                 font-size: 24px;
                 color: white;
             }

             .settings-title {
                 font-size: 2rem;
                 font-weight: 700;
                 color: var(--text-primary);
                 margin: 0;
             }

             .settings-description {
                 color: var(--text-secondary);
                 margin-bottom: 40px;
                 font-size: 1.1rem;
             }

             .settings-category {
                 background: var(--card-background);
                 border-radius: 12px;
                 padding: 25px;
                 margin-bottom: 25px;
                 box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
                 border: 1px solid var(--border-color);
             }

             .category-title {
                 font-size: 1.3rem;
                 font-weight: 600;
                 color: var(--text-primary);
                 margin-bottom: 20px;
                 padding-bottom: 10px;
                 border-bottom: 2px solid var(--primary-color);
                 display: inline-block;
             }

             .form-group {
                 margin-bottom: 20px;
             }

             .form-label {
                 font-weight: 500;
                 color: var(--text-primary);
                 margin-bottom: 8px;
                 display: block;
             }

             .form-control {
                 border: 2px solid var(--border-color);
                 border-radius: 8px;
                 padding: 12px 15px;
                 font-size: 14px;
                 transition: all 0.3s ease;
                 background-color: #fff;
             }

             .form-control:focus {
                 border-color: var(--primary-color);
                 box-shadow: 0 0 0 0.2rem rgba(17, 138, 178, 0.1);
                 outline: none;
             }

             .form-select {
                 border: 2px solid var(--border-color);
                 border-radius: 8px;
                 padding: 12px 15px;
                 font-size: 14px;
                 transition: all 0.3s ease;
                 background-color: #fff;
             }

             .form-select:focus {
                 border-color: var(--primary-color);
                 box-shadow: 0 0 0 0.2rem rgba(17, 138, 178, 0.1);
                 outline: none;
             }

             .upload-area {
                 border: 2px dashed var(--border-color);
                 border-radius: 8px;
                 padding: 30px;
                 text-align: center;
                 transition: all 0.3s ease;
                 cursor: pointer;
                 background-color: #fafafa;
             }

             .upload-area:hover {
                 border-color: var(--primary-color);
                 background-color: rgba(17, 138, 178, 0.05);
             }

             .upload-icon {
                 font-size: 2rem;
                 color: var(--text-secondary);
                 margin-bottom: 10px;
             }

             .upload-text {
                 color: var(--text-secondary);
                 font-size: 14px;
             }

             .day-schedule {
                 display: flex;
                 align-items: center;
                 padding: 15px 0;
                 border-bottom: 1px solid var(--border-color);
             }

             .day-schedule:last-child {
                 border-bottom: none;
             }

             .day-name {
                 font-weight: 500;
                 width: 120px;
                 color: var(--text-primary);
             }

             .day-toggle {
                 margin-right: 20px;
             }

             .toggle-switch {
                 position: relative;
                 display: inline-block;
                 width: 50px;
                 height: 24px;
             }

             .toggle-switch input {
                 opacity: 0;
                 width: 0;
                 height: 0;
             }

             .slider {
                 position: absolute;
                 cursor: pointer;
                 top: 0;
                 left: 0;
                 right: 0;
                 bottom: 0;
                 background-color: #ccc;
                 transition: .4s;
                 border-radius: 24px;
             }

             .slider:before {
                 position: absolute;
                 content: "";
                 height: 18px;
                 width: 18px;
                 left: 3px;
                 bottom: 3px;
                 background-color: white;
                 transition: .4s;
                 border-radius: 50%;
             }

             input:checked + .slider {
                 background-color: var(--primary-color);
             }

             input:checked + .slider:before {
                 transform: translateX(26px);
             }

             .time-inputs {
                 display: flex;
                 align-items: center;
                 gap: 15px;
                 flex: 1;
             }

             .time-input {
                 width: 120px;
             }

             .save-button {
                 background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                 color: white;
                 border: none;
                 padding: 15px 40px;
                 border-radius: 8px;
                 font-size: 16px;
                 font-weight: 600;
                 cursor: pointer;
                 transition: all 0.3s ease;
                 margin-top: 30px;
             }

             .save-button:hover {
                 transform: translateY(-2px);
                 box-shadow: 0 4px 15px rgba(17, 138, 178, 0.3);
             }

             .menu-toggle-card {
                 background: linear-gradient(135deg, #e8f5e8, #f0f8ff);
                 border: 2px solid var(--secondary-color);
             }

             .big-toggle {
                 transform: scale(1.5);
                 margin: 20px;
             }

             .logo-preview, .banner-preview {
                 width: 150px;
                 height: 150px;
                 border: 2px dashed var(--border-color);
                 border-radius: 8px;
                 display: flex;
                 align-items: center;
                 justify-content: center;
                 margin-top: 10px;
                 background-color: #fafafa;
                 overflow: hidden;
             }

             .banner-preview {
                 width: 300px;
                 height: 100px;
             }

             .preview-icon {
                 font-size: 2rem;
                 color: var(--text-secondary);
             }

             @media (max-width: 768px) {
                 .page-sidebar {
                     transform: translateX(-100%);
                 }
                 
                 .page-content {
                     margin-left: 0;
                     width: 100%;
                     padding: 20px;
                 }
                 
                 .day-schedule {
                     flex-direction: column;
                     align-items: flex-start;
                     gap: 10px;
                 }
                 
                 .time-inputs {
                     width: 100%;
                     justify-content: space-between;
                 }
             }
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
                    <li class="sidebar-title"><?= $t['main_functions'] ?></li>
                    <li><a href="./dashboard.php"><i data-feather="home"></i><?= $t['dashboard'] ?></a></li>
                    <li><a href="./languages.php"><i data-feather="globe"></i><?= $t['language'] ?></a></li>
                    <li><a href="./menu.php"><i data-feather="menu"></i><?= $t['menu'] ?></a></li>
                    <li><a href="./"><i data-feather="coffee"></i><?= $t['inventory'] ?></a></li>
                    <li><a href="./qr-code.php"><i data-feather="code"></i><?= $t['qr_code'] ?></a></li>
                    <li><a href="./settings.php" style="color: #118ab2 !important;"><i data-feather="tool" style="color: #118ab2 !important;"></i><?= $t['main_settings'] ?></a></li>
                    <li class="sidebar-title"><?= $t['pro_functions'] ?></li>
                    <li><a href="profilo"><i data-feather="pen-tool"></i><?= $t['theme_settings'] ?></a></li>
                    <li><a href="./"><i data-feather="eye-off"></i><?= $t['menu_logo'] ?></a></li>
                    <li><a href="./"><i data-feather="award"></i><?= $t['banner'] ?></a></li>
                    <li><a href="./"><i data-feather="layout"></i><?= $t['popup'] ?></a></li>
                    <li><a href="./"><i data-feather="star"></i><?= $t['google_reviews'] ?></a></li>
                    <li><a href="./"><i data-feather="monitor"></i><?= $t['minigame'] ?></a></li>
                    <li><a href="./"><i data-feather="shopping-cart"></i><?= $t['delivery_link'] ?></a></li>
                    <li><a href="./"><i data-feather="key"></i><?= $t['password_protection'] ?></a></li>
                </ul>
            </div>
            <div class="page-content">
                <div class="main-wrapper">
                    <div class="qr-section">
                        <div class="qr-header">
                            <div class="language-icon"><i class="fas fa-gears"></i></div>
                            <div><h1 class="language-title"><?= $t['settings_title'] ?></h1></div>
                        </div>
                        <p class="qr-description"><?= $t['settings_description'] ?></p>
                    </div>

                    <form id="settingsForm">
                        <div class="settings-category">
                            <h3 class="category-title"><?= $t['restaurant_media_title'] ?></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['restaurant_logo_label'] ?></label>
                                        <div class="upload-area" onclick="document.getElementById('logoUpload').click()">
                                            <div class="logo-preview">
                                                <?php if (!empty($locali['logo_url'])): ?>
                                                    <img src="<?= htmlspecialchars($locali['logo_url']) ?>" alt="Logo Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                                <?php else: ?>
                                                    <div class="upload-icon"><i class="fas fa-image"></i></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <input type="file" id="logoUpload" name="logo_url" accept="image/*" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['restaurant_banner_label'] ?></label>
                                        <div class="upload-area" onclick="document.getElementById('bannerUpload').click()">
                                             <div class="banner-preview">
                                                <?php if (!empty($locali['cover_url'])): ?>
                                                    <img src="<?= htmlspecialchars($locali['cover_url']) ?>" alt="Banner Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                                <?php else: ?>
                                                    <div class="upload-icon"><i class="fas fa-image"></i></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <input type="file" id="bannerUpload" name="cover_url" accept="image/*" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="settings-category">
                            <h3 class="category-title"><?= $t['basic_info_title'] ?></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['restaurant_name_label'] ?></label>
                                        <input type="text" class="form-control" id="restaurantName" placeholder="<?= $t['restaurant_name_placeholder'] ?>" value="<?= htmlspecialchars($locali['name'] ?? '') ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['currency_label'] ?></label>
                                        <select class="form-select" id="currency">
                                            <option value="EUR" <?= ($locali['currency'] == 'EUR') ? 'selected' : '' ?>><?= $t['currency_euro'] ?></option>
                                            <option value="USD" <?= ($locali['currency'] == 'USD') ? 'selected' : '' ?>><?= $t['currency_usd'] ?></option>
                                            <option value="GBP" <?= ($locali['currency'] == 'GBP') ? 'selected' : '' ?>><?= $t['currency_gbp'] ?></option>
                                            <option value="CHF" <?= ($locali['currency'] == 'CHF') ? 'selected' : '' ?>><?= $t['currency_chf'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['wifi_name_label'] ?></label>
                                        <input type="text" class="form-control" id="wifiName" placeholder="<?= $t['wifi_name_placeholder'] ?>" value="<?= htmlspecialchars($wifi['wifi_name'] ?? '') ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['wifi_password_label'] ?></label>
                                        <input type="text" class="form-control" id="wifiPassword" placeholder="<?= $t['wifi_password_placeholder'] ?>" value="<?= htmlspecialchars($wifi['wifi_password'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="settings-category">
                            <h3 class="category-title"><?= $t['contact_info_title'] ?></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['address_label'] ?></label>
                                        <input class="form-control" id="address" placeholder="<?= $t['address_placeholder'] ?>" value="<?= htmlspecialchars($locali['address'] ?? '') ?>"></input>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['phone_number_label'] ?></label>
                                        <input type="tel" class="form-control" id="phone" placeholder="<?= $t['phone_number_placeholder'] ?>" value="<?= htmlspecialchars($locali['phone'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['instagram_label'] ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="instagram" placeholder="<?= $t['instagram_placeholder'] ?>" value="<?= htmlspecialchars(str_replace(['https://www.instagram.com/', 'https://instagram.com/', '/'], '', $socials['instagram'] ?? '')) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?= $t['facebook_label'] ?></label>
                                        <input type="url" class="form-control" id="facebook" placeholder="<?= $t['facebook_placeholder'] ?>" value="<?= htmlspecialchars($socials['facebook'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="settings-category">
                            <h3 class="category-title"><?= $t['opening_hours_title'] ?></h3>
                            <p class="text-muted mb-4"><?= $t['opening_hours_description'] ?></p>

                            <div class="form-group mb-4">
                                <label class="form-label"><?= $t['enable_second_shift'] ?? 'Abilita seconda fascia oraria' ?></label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="second_hours_enabled" name="second_hours_enabled" value="1" <?= !empty($locali['second_hours_enabled']) ? 'checked' : '' ?>>
                                    <span class="slider"></span>
                                </label>
                            </div>


                            <?php foreach ($hours as $i => $hour): ?>
                            <div class="day-schedule">
                                <div class="day-name"><?= $days_map[$i] ?></div>
                                <div class="day-toggle">
                                    <label class="toggle-switch">
                                        <input type="checkbox" class="day-toggle-cb" data-day-index="<?= $i ?>" <?= $hour['is_open'] ? 'checked' : '' ?>>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="time-inputs">
                                    <div>
                                        <label class="form-label small"><?= $t['opening_time'] ?></label>
                                        <input type="time" class="form-control time-input open-time" value="<?= substr($hour['open_time'], 0, 5) ?>" <?= !$hour['is_open'] ? 'disabled' : '' ?>>
                                    </div>
                                    <div>
                                        <label class="form-label small"><?= $t['closing_time'] ?></label>
                                        <input type="time" class="form-control time-input close-time" value="<?= substr($hour['close_time'], 0, 5) ?>" <?= !$hour['is_open'] ? 'disabled' : '' ?>>
                                    </div>
                                </div>
                                <div class="second-time-inputs" style="<?= !empty($settings['second_hours_enabled']) ? '' : 'display:none;' ?>">
                                    <div>
                                        <label class="form-label small"><?= $t['second_opening_time'] ?? 'Seconda apertura' ?></label>
                                        <input type="time" class="form-control time-input second-open-time" value="<?= isset($hour['second_open_time']) ? substr($hour['second_open_time'], 0, 5) : '' ?>" <?= !$hour['is_open'] ? 'disabled' : '' ?>>
                                    </div>
                                    <div>
                                        <label class="form-label small"><?= $t['second_closing_time'] ?? 'Seconda chiusura' ?></label>
                                        <input type="time" class="form-control time-input second-close-time" value="<?= isset($hour['second_close_time']) ? substr($hour['second_close_time'], 0, 5) : '' ?>" <?= !$hour['is_open'] ? 'disabled' : '' ?>>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="settings-category menu-toggle-card">
                            <h3 class="category-title"><?= $t['menu_status_title'] ?></h3>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-2"><strong><?= $t['menu_active_heading'] ?></strong></p>
                                    <p class="text-muted mb-0"><?= $t['menu_active_description'] ?></p>
                                </div>
                                <div class="big-toggle">
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="menuActive" <?= $locali['is_active'] ? 'checked' : '' ?>>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="save-button">
                                <i class="fas fa-save me-2"></i>
                                <?= $t['save_settings_button'] ?>
                            </button>
                        </div>
                    </form>
                     <div id="alert-container" class="mt-3"></div>
                </div>
            </div>
        </div>

        <script src="../public/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../public/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../public/assets/js/main.min.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const secondHoursEnabled = document.getElementById('second_hours_enabled');

            function toggleSecondShiftDisplay() {
                const secondInputs = document.querySelectorAll('.second-time-inputs');
                secondInputs.forEach(el => {
                    el.style.display = secondHoursEnabled.checked ? "flex" : "none";
                });
            }

            secondHoursEnabled.addEventListener('change', toggleSecondShiftDisplay);
            toggleSecondShiftDisplay();
        });
        </script>


        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Toggle sidebar
                const sidebarToggle = document.getElementById('sidebar-toggle');
                if(sidebarToggle) {
                    sidebarToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.querySelector('.page-container').classList.toggle('sidebar-collapsed');
                    });
                }

                // File upload preview
                function setupFileUpload(inputId, previewClass) {
                    const input = document.getElementById(inputId);
                    if(!input) return;
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const preview = document.querySelector(previewClass);
                        if (file && preview) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">`;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }
                setupFileUpload('logoUpload', '.logo-preview');
                setupFileUpload('bannerUpload', '.banner-preview');

                // Toggle switches for opening hours
                document.querySelectorAll('.day-toggle-cb').forEach(toggle => {
                    toggle.addEventListener('change', function() {
                        const daySchedule = this.closest('.day-schedule');
                        const allTimeContainers = daySchedule.querySelectorAll('.time-inputs, .second-time-inputs');

                        allTimeContainers.forEach(container => {
                            const inputs = container.querySelectorAll('input[type="time"]');
                            inputs.forEach(input => {
                                input.disabled = !this.checked;
                            });
                            container.style.opacity = this.checked ? '1' : '0.5';
                        });
                    });

                    // Inizializzazione al load
                    toggle.dispatchEvent(new Event('change'));
                });


                // Form submission
                const settingsForm = document.getElementById('settingsForm');
                if(settingsForm) {
                    settingsForm.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        
                        const submitBtn = this.querySelector('.save-button');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = `<i class="fas fa-spinner fa-spin me-2"></i><?= $t['saving'] ?>`;
                        submitBtn.disabled = true;

                        try {
                            // Handle file uploads first if any
                            const logoFile = document.getElementById('logoUpload').files[0];
                            const bannerFile = document.getElementById('bannerUpload').files[0];
                            
                            if (logoFile || bannerFile) {
                                const fileFormData = new FormData();
                                if (logoFile) fileFormData.append('logo', logoFile);
                                if (bannerFile) fileFormData.append('banner', bannerFile);
                                
                                await fetch('../public/save_settings.php', {
                                    method: 'POST',
                                    body: fileFormData
                                }).then(response => response.json());
                            }

                            // Then handle other form data
                            const formData = {
                                restaurantName: document.getElementById('restaurantName').value,
                                currency: document.getElementById('currency').value,
                                wifiName: document.getElementById('wifiName').value,
                                wifiPassword: document.getElementById('wifiPassword').value,
                                address: document.getElementById('address').value,
                                phone: document.getElementById('phone').value,
                                instagram: document.getElementById('instagram').value,
                                facebook: document.getElementById('facebook').value,
                                menuActive: document.getElementById('menuActive').checked,
                                second_hours_enabled: document.getElementById('second_hours_enabled').checked
                            };

                            // Add opening hours
                            const openingHours = [];
                            document.querySelectorAll('.day-schedule').forEach((dayEl) => {
                                openingHours.push({
                                    day: dayEl.querySelector('.day-toggle-cb').dataset.dayIndex,
                                    isOpen: dayEl.querySelector('.day-toggle-cb').checked,
                                    open: dayEl.querySelector('.open-time').value,
                                    close: dayEl.querySelector('.close-time').value,
                                    second_open: dayEl.querySelector('.second-open-time').value,
                                    second_close: dayEl.querySelector('.second-close-time').value
                                });
                            });
                            formData.openingHours = openingHours;

                            // Send form data
                            const response = await fetch('../public/save_settings.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(formData)
                            });

                            const data = await response.json();
                            
                            if (data.status === 'success') {
                                showAlert(data.message, 'success');
                                if (data.updates) {
                                    if (data.updates.logo_url) {
                                        updateImagePreview('.logo-preview', data.updates.logo_url);
                                    }
                                    if (data.updates.cover_url) {
                                        updateImagePreview('.banner-preview', data.updates.cover_url);
                                    }
                                }
                            } else {
                                showAlert(data.message, 'danger');
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            showAlert(error.message, 'danger');
                        } finally {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        }
                    });
                }
                
                function updateImagePreview(selector, url) {
                    const preview = document.querySelector(selector);
                    if (preview) {
                        preview.innerHTML = `<img src="${url}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">`;
                    }
                }
                
                function showAlert(message, type = 'success') {
                    const alertContainer = document.getElementById('alert-container');
                     const wrapper = document.createElement('div');
                     wrapper.innerHTML = [
                        `<div class="alert alert-${type} alert-dismissible fade show" role="alert">`,
                        `   <div><i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-times-circle'} me-2"></i> ${message}</div>`,
                        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                        '</div>'
                    ].join('');

                    alertContainer.append(wrapper);

                    setTimeout(() => {
                        const bsAlert = new bootstrap.Alert(wrapper.querySelector('.alert'));
                        bsAlert.close();
                    }, 5000);
                }

                // Feather Icons
                feather.replace();
            });
        </script>
    </body>
</html>