<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuNow - Dashboard">
        <meta name="author" content="Mast3r">

        <title><?= $t['page_title_dashboard'] ?></title>

        <!-- Theme Styles - Non Toccare-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <!-- Font Awesome 6 (CDN) -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css">
        <link rel="shortcut icon" href="<?php echo $base_path; ?>assets/images/loona.ico">

        <!-- Theme Styles - Non Toccare-->
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
                    <li><a class="dropdown-item" href="?lang=en"><img src="https://flagcdn.com/w40/gb.png" width="20" height="20" class="rounded-circle me-2">English</a></li>
                    <li><a class="dropdown-item"href="?lang=de"><img src="https://flagcdn.com/w40/de.png" width="20" height="20" class="rounded-circle me-2">German</a></li>
                    <li><a class="dropdown-item" href="?lang=it"><img src="https://flagcdn.com/w40/it.png" width="20" height="20" class="rounded-circle me-2">Italian</a></li>
                  </ul>
                  </div>
                </div>
                <div class="A-4">
                  <!-- Bottone che attiva il dropdown -->
                  <button class="btn p-0 border-0 bg-transparent" type="button" id="SettingsDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="DIV-11">
                      <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="26" width="26" xmlns="http://www.w3.org/2000/svg" class="svg-6">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" class="path-20"></path>
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" class="path-21"></path>
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" class="path-22"></path>
                      </svg>
                    </div>
                  </button>
                  
                  <!-- Menu dropdown -->
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
                    <a style="color: #118ab2 !important;" href="./dashboard.php"><i style="color: #118ab2 !important;" data-feather="home"></i><?= $t['dashboard'] ?></a>
                  </li>
                   <li>
                    <a href="./languages.php"><i data-feather="globe"></i><?= $t['language'] ?></a>
                  </li>       
                   <li>
                    <a href="./menu.php"><i data-feather="menu"></i><?= $t['menu'] ?></a>
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
                <div class="row">
                    <!-- Sezione Principale -->
                    <div class="col-lg-8">
                        <!-- Card Creare Menu -->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="language-header">
                                  <div class="language-icon">
                                      <i class="fas fa-paintbrush"></i>
                                  </div>
                                  <div>
                                      <h1 class="language-title"><?= $t['create_menu'] ?></h1>
                                  </div>
                              </div>
                                <span><?= $t['menu_steps'] ?></span>
                                </br></br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="step-container">
                                            <!-- Step 1 -->
                                          <div class="d-flex mb-4 p-3 bg-custom-step rounded-3 border-start border-4">
                                              <div class="circle-modern me-3" style="font-weight: bold; font-size: 14px;">1</div>
                                              <div class="flex-grow-1">                            
                                                  <div class="d-flex justify-content-between align-items-start">
                                                      <div>
                                                          <h6 class="mb-2 fw-bold text-dark"><?= $t['step1_title'] ?></h6>
                                                          <p class="text-muted mb-1 small lh-sm"><?= $t['step1_text1'] ?></p>
                                                          <p class="mb-0 small">
                                                              <a href="#" class="text-primary fw-semibold text-decoration-none"><?= $t['step1_link'] ?></a>
                                                              <span class="text-muted"><?= $t['step1_text2'] ?></span>
                                                          </p>
                                                      </div>
                                                        <div class="circle-modern me-3" style="width: 35px; height: 35px;">
                                                            <i class="fas fa-gear icon-white" style="font-size: 14px;"></i>
                                                        </div>
                                                  </div>
                                              </div>
                                          </div>
                                            
                                            <!-- Step 2 -->
                                            <div class="d-flex mb-4 p-3 bg-light rounded-3 border-start border-4">
                                              <div class="circle-modern me-3" style="font-weight: bold; font-size: 14px;">2</div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h6 class="mb-2 fw-bold text-dark"><?= $t['step2_title'] ?></h6>
                                                            <p class="mb-0 small">
                                                                <span class="text-muted"><?= $t['step2_text1'] ?></span>
                                                                <a href="#" class="text-primary fw-semibold text-decoration-none"><?= $t['step2_link'] ?></a> 
                                                                <span class="text-muted"><?= $t['step2_text2'] ?></span>
                                                            </p>
                                                        </div>
                                                        <div class="circle-modern me-3" style="width: 35px; height: 35px;">
                                                            <i class="fas fa-folder icon-white" style="font-size: 14px;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Step 3 -->
                                            <div class="d-flex mb-4 p-3 bg-light rounded-3 border-start border-4">
                                              <div class="circle-modern me-3" style="font-weight: bold; font-size: 14px;">3</div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h6 class="mb-2 fw-bold text-dark"><?= $t['step3_title'] ?></h6>
                                                            <p class="mb-0 small">
                                                                <span class="text-muted"><?= $t['step3_text1'] ?></span>
                                                                <a href="#" class="text-primary fw-semibold text-decoration-none"><?= $t['step3_link'] ?></a> 
                                                                <span class="text-muted"><?= $t['step3_text2'] ?></span>
                                                            </p>
                                                        </div>
                                                        <div class="circle-modern me-3" style="width: 35px; height: 35px;">
                                                            <i class="fas fa-utensils icon-white" style="font-size: 14px;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Step 4 -->
                                            <div class="d-flex mb-4 p-3 bg-light rounded-3 border-start border-success border-4">
                                              <div class="circle-modern me-3" style="font-weight: bold; font-size: 14px;">4</div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h6 class="mb-2 fw-bold text-dark"><?= $t['step4_title'] ?></h6>
                                                            <div class="small">
                                                                <p class="mb-1 text-muted"><?= $t['step4_text1'] ?></p>
                                                                <p class="mb-1">
                                                                    <a href="https://www.menuviel.com/menu/<?= htmlspecialchars($linkslug) ?>" class="text-primary fw-semibold text-decoration-none">menuviel.com/menu/<?= htmlspecialchars($linkslug) ?></a>
                                                                </p>
                                                                <p class="mb-1 text-muted"><?= $t['step4_text2'] ?></p>
                                                                <p class="mb-0">
                                                                    <span class="text-muted"><?= $t['step4_text3'] ?></span>
                                                                    <a href="#" class="text-primary fw-semibold text-decoration-none"><?= $t['step4_link'] ?></a>
                                                                    <span class="text-muted"><?= $t['step4_text4'] ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="circle-modern me-3" style="width: 35px; height: 35px;">
                                                            <i class="fas fa-mobile icon-white" style="font-size: 14px;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Video Tutorial Section -->
                                <div class="mt-4">
                                    <div class="bg-dark rounded-3 position-relative overflow-hidden" style="height: 250px; background: linear-gradient(45deg, #1a1a1a 0%, #2d2d2d 100%);">
                                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                                            <div class="circle-modern mx-auto circle-play">
                                                <i class="fas fa-play icon-white" style="margin-left: 4px;"></i>
                                            </div>
                                            <h5 class="text-white mb-2"><?= $t['video_title'] ?></h5>
                                            <p class="text-white-50 mb-0 small"><?= $t['video_subtitle'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar Destra -->
                    <div class="col-lg-4">
                        <!-- Card Trial -->
                      <div class="card bg-dark text-white mb-4 p-4 d-flex flex-row align-items-center justify-content-between">
                        <div>
                          <h5 class="card-title text-uppercase fw-bold"><?= $t['trial_card_title'] ?></h5>
                          <p class="card-text mb-1"><?= $t['trial_card_text1'] ?></p>
                          <p class="card-text"><?= $t['trial_card_text2'] ?></p>
                          <a href="#" class="btn btn-primary fw-bold text-uppercase mt-2"><?= $t['trial_card_button'] ?></a>
                        </div>
                        <div class="text-center ms-4">
                          <svg width="80" height="80" viewBox="0 0 36 36">
                            <!-- Sfondo cerchio -->
                            <circle cx="18" cy="18" r="16" fill="none" stroke="#444" stroke-width="4"/>
                            <!-- Cerchio bianco per giorni rimanenti -->
                            <circle cx="18" cy="18" r="16" fill="none" stroke="#ffffff" stroke-width="4"
                                    stroke-dasharray="100" stroke-dashoffset="30" stroke-linecap="round"
                                    transform="rotate(-90 18 18)"/>
                            <!-- Numero giorni -->
                            <text x="50%" y="48%" dominant-baseline="middle" text-anchor="middle" font-size="10" fill="white" font-weight="bold">21</text>
                            <!-- Testo "Tage" -->
                            <text x="50%" y="64%" dominant-baseline="middle" text-anchor="middle" font-size="6" fill="white"><?= $t['days'] ?></text>
                          </svg>
                        </div>
                      </div>
                <!-- Sezione News Orizzontale -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fas fa-bullhorn me-2 text-primary"></i>
                                    <h5 class="mb-0"><?= $t['news_title'] ?></h5>
                                </div>
                                <p class="text-muted mb-4"><?= $t['news_intro'] ?></p>
                                
                                <!-- News Item 1 -->
                                <div class="d-flex mb-4">
                                    <i class="fas fa-bullhorn text-primary me-3 mt-1" style="font-size: 18px;"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2"><?= $t['news1_title'] ?></h6>
                                        <p class="mb-2"><?= $t['news1_text1'] ?></p>
                                        <p class="mb-2"><?= $t['news1_text2'] ?></p>
                                        <ul class="mb-2">
                                            <li><?= $t['news1_item1'] ?></li>
                                            <li><?= $t['news1_item2'] ?></li>
                                            <li><?= $t['news1_item3'] ?></li>
                                        </ul>
                                        <p class="fst-italic small"><?= $t['news1_footer'] ?></p>
                                    </div>
                                </div>
                                
                                <!-- News Item 2 -->
                                <div class="d-flex mb-4">
                                    <i class="fas fa-star text-warning me-3 mt-1" style="font-size: 18px;"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2"><?= $t['news2_title'] ?></h6>
                                        <p class="mb-2"><?= $t['news2_text1'] ?></p>
                                        <p class="mb-2"><?= $t['news2_text2'] ?></p>
                                        <ul class="mb-2">
                                            <li><?= $t['news2_item1'] ?></li>
                                            <li><?= $t['news2_item2'] ?></li>
                                            <li><?= $t['news2_item3'] ?></li>
                                        </ul>
                                        <p class="mb-3"><?= $t['news2_text3'] ?></p>
                                        <p class="mb-3"><strong><?= $t['news2_text4'] ?></strong></p>
                                        <p class="small text-muted mb-3"><?= $t['news2_footer'] ?></p>
                                        <button class="btn btn-primary"><?= $t['news2_button'] ?></button>
                                    </div>
                                </div>
                                
                                <!-- News Item 3 -->
                                <div class="d-flex">
                                    <i class="fas fa-credit-card text-info me-3 mt-1" style="font-size: 18px;"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2 text-info"><?= $t['news3_title'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        
        <!-- Javascripts -->
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
                // Add any additional JavaScript functionality here
                console.log('Dashboard loaded successfully');
            });
    </body>
</html>