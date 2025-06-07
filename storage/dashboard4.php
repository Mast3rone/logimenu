<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuNow - Dashboard">
        <meta name="keywords" content="menunow,menunowdashboard">
        <meta name="author" content="Mast3r">

        <title>MenuNow - Dashboard</title>

        <!-- Theme Styles - Non Toccare-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css">
        <link rel="shortcut icon" href="<?php echo $base_path; ?>assets/images/loona.ico">

      
        <!-- Theme Styles - Non Toccare-->
        <link href="../public/assets/css/dashboard/main.min.css" rel="stylesheet">
        <link href="../public/assets/css/dashboard/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/assets/css/dashboard.css">
 <style>
            
            .page-content {
                margin-left: 280px;
                margin-top: 70px;
                flex: 1;
                padding: 0;
            }

            .main-wrapper {
                padding: 32px;
                max-width: 1200px;
            }

            .header-section {
                display: flex;
                align-items: center;
                margin-bottom: 24px;
            }

            .restaurant-icon {
                width: 48px;
                height: 48px;
                background: #3b82f6;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 16px;
                color: white;
                font-size: 20px;
            }

            .restaurant-info h1 {
                font-size: 24px;
                font-weight: 700;
                color: #111827;
                margin: 0;
            }

            .restaurant-info p {
                font-size: 14px;
                color: #6b7280;
                margin: 0;
            }

            .main-content {
                display: grid;
                grid-template-columns: 1fr 400px;
                gap: 32px;
            }

            .left-column {
                background: white;
                border-radius: 16px;
                padding: 32px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }

            .right-column {
                display: flex;
                flex-direction: column;
                gap: 24px;
            }

            .section-title {
                font-size: 20px;
                font-weight: 600;
                color: #111827;
                margin-bottom: 24px;
            }

            .form-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 16px 0;
                border-bottom: 1px solid #f3f4f6;
            }

            .form-row:last-child {
                border-bottom: none;
            }

            .form-label {
                font-size: 14px;
                font-weight: 500;
                color: #374151;
            }

            .form-value {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .form-value span {
                font-size: 14px;
                color: #6b7280;
            }

            .upload-btn {
                background: #3b82f6;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 8px;
                font-size: 12px;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s;
            }

            .upload-btn:hover {
                background: #2563eb;
            }

            .add-btn {
                background: #3b82f6;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 8px;
                font-size: 12px;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s;
            }

            .add-btn:hover {
                background: #2563eb;
            }

            .promo-card {
                background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
                border-radius: 16px;
                padding: 32px;
                color: white;
                position: relative;
                overflow: hidden;
            }

            .promo-card::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 200px;
                height: 200px;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="150" cy="50" r="80" fill="rgba(255,255,255,0.1)"/></svg>');
                background-size: contain;
                background-repeat: no-repeat;
            }

            .promo-header {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 12px;
                position: relative;
                z-index: 1;
            }

            .promo-text {
                font-size: 14px;
                color: rgba(255,255,255,0.8);
                margin-bottom: 20px;
                line-height: 1.5;
                position: relative;
                z-index: 1;
            }

            .promo-cta {
                background: #10b981;
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                transition: background 0.3s;
                position: relative;
                z-index: 1;
            }

            .promo-cta:hover {
                background: #059669;
            }

            .countdown {
                position: absolute;
                top: 24px;
                right: 24px;
                text-align: center;
                z-index: 1;
            }

            .countdown-number {
                font-size: 32px;
                font-weight: 700;
                color: white;
            }

            .countdown-label {
                font-size: 12px;
                color: rgba(255,255,255,0.7);
                margin-top: 4px;
            }

            .steps-card {
                background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
                border-radius: 16px;
                padding: 32px;
                color: #581c87;
            }

            .steps-title {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 8px;
            }

            .steps-subtitle {
                font-size: 14px;
                color: #7c3aed;
                margin-bottom: 24px;
                line-height: 1.5;
            }

            .step {
                display: flex;
                align-items: flex-start;
                margin-bottom: 20px;
            }

            .step:last-child {
                margin-bottom: 0;
            }

            .step-number {
                width: 32px;
                height: 32px;
                background: #7c3aed;
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                font-weight: 600;
                margin-right: 16px;
                flex-shrink: 0;
            }

            .step-content {
                flex: 1;
                padding-top: 4px;
            }

            .step-text {
                font-size: 14px;
                font-weight: 500;
                color: #581c87;
                line-height: 1.4;
            }

            .video-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 20px;
                height: 20px;
                background: #ef4444;
                color: white;
                border-radius: 4px;
                margin-left: 8px;
                font-size: 10px;
            }

            .navbar-brand img {
                height: 32px;
            }

            .nav-link {
                color: #6b7280 !important;
                font-weight: 500;
            }

            .nav-link:hover {
                color: #3b82f6 !important;
            }

            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                border-radius: 12px;
                padding: 8px;
            }

            .dropdown-item {
                border-radius: 8px;
                padding: 12px;
                font-size: 14px;
                display: flex;
                align-items: center;
            }

            .dropdown-item:hover {
                background-color: #f3f4f6;
            }

            .dropdown-item img {
                margin-right: 12px;
            }

            .btn-icon {
                background: none;
                border: none;
                color: #6b7280;
                padding: 8px;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s;
            }

            .btn-icon:hover {
                background-color: #f3f4f6;
                color: #3b82f6;
            }

            @media (max-width: 1024px) {
                .main-content {
                    grid-template-columns: 1fr;
                    gap: 24px;
                }
                
                .page-sidebar {
                    transform: translateX(-100%);
                    transition: transform 0.3s;
                }
                
                .page-content {
                    margin-left: 0;
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
                            <p class="P-0">Vorschau</p>
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
                      <img alt="Language" width="22" height="22" src="https://flagcdn.com/w40/de.png" class="IMG-1" />
                    </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdownToggle">
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/gb.png" width="20" height="20" class="rounded-circle me-2">English</a></li>
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/de.png" width="20" height="20" class="rounded-circle me-2">German</a></li>
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/fr.png" width="20" height="20" class="rounded-circle me-2">French</a></li>
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/tr.png" width="20" height="20" class="rounded-circle me-2">Turkish</a></li>
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/es.png" width="20" height="20" class="rounded-circle me-2">Spanish</a></li>
                    <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/pt.png" width="20" height="20" class="rounded-circle me-2">Portuguese</a></li>
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
                    <li><a class="dropdown-item" href="#"><img src="https://cdn.discordapp.com/attachments/1373642048879726735/1374835700222005248/account.png?ex=682f7f06&is=682e2d86&hm=5f4ab96e7f59ed2ad0a48290f9956046662b19bd106fc5fdd0c846413febe2e2&" width="20" height="20" class="rounded-circle me-2">Kontoeinstellungen</a></li>
                    <li><a class="dropdown-item" href="./logout.php"><img src="https://cdn.discordapp.com/attachments/780527297525841970/1374838535693275177/image.png?ex=682f81aa&is=682e302a&hm=a6eb816a5d2c7fb559ebdaf4792660a5073ff5f3dce9a9d67789bc22f61d73f6&" width="20" height="20" class="rounded-circle me-2">Abmelden</a></li>
                  </ul>
                </div>
            </nav>
        </div>
            <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                  <li class="sidebar-title">
                    Hauptfunktionen
                  </li>
                  <li>
                    <a href="./"><i data-feather="home"></i>Dashboard</a>
                  </li>
                   <li>
                    <a href="./"><i data-feather="globe"></i>Sprachen</a>
                  </li>       
                   <li>
                    <a href="./"><i data-feather="menu"></i>Menüs</a>
                  </li>
                   <li>
                    <a href="./"><i data-feather="coffee"></i>Bestandaufnahme</a>
                  </li>    
                    <li>
                    <a href="./"><i data-feather="code"></i>QR Code</a>
                  </li>
                   <li>
                    <a href="./"><i data-feather="tool"></i>Haupteinstellungen</a>
                  </li>           
                  <li class="sidebar-title">
                    Pro Boosters
                  </li>
                  <li>
                    <a href="profilo"><i data-feather="pen-tool"></i>Theme Einstellungen</a>
                  </li>
                  <li>
                    <a href="./"><i data-feather="eye-off"></i>MenuNow Logo</a>
                  </li>
                  <li>
                    <a href="./"><i data-feather="award"></i>Werbebanner</a>
                  </li>
                    <li>
                    <a href="./"><i data-feather="layout"></i>Pop-up Banner</a>
                  </li>
                    <li>
                    <a href="./"><i data-feather="star"></i>Google Bewertungen</a>
                  </li>
                    <li>
                    <a href="./"><i data-feather="monitor"></i>Minigame</a>
                  </li>
                    <li>
                    <a href="./"><i data-feather="shopping-cart"></i>Delivery Links</a>
                  </li>
                    <li>
                    <a href="./"><i data-feather="key"></i>Passwortschutz</a>
                  </li>
                </ul>
            </div>
            <div class="page-content">
            <div class="main-wrapper">
                    <div class="header-section">
                        <div class="restaurant-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="restaurant-info">
                            <h1>Armaturenbrett</h1>
                            <p>Pizzakronik</p>
                        </div>
                    </div>

                    <div class="main-content">
                        <div class="left-column">
                            <h2 class="section-title">Platz Zusammenfassung</h2>
                            
                            <div class="form-row">
                                <span class="form-label">Platz Name:</span>
                                <div class="form-value">
                                    <span>Pizzakronik</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Link Platzieren (URL):</span>
                                <div class="form-value">
                                    <span>menuviel.com/pizzakroniks</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Logo:</span>
                                <div class="form-value">
                                    <button class="upload-btn">Hochladen</button>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Titelbild:</span>
                                <div class="form-value">
                                    <button class="upload-btn">Hochladen</button>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Währung:</span>
                                <div class="form-value">
                                    <span>EUR</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Primäre Sprache:</span>
                                <div class="form-value">
                                    <span>IT</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Thema:</span>
                                <div class="form-value">
                                    <span>LIGHT</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Telefon Nummer:</span>
                                <div class="form-value">
                                    <button class="add-btn">Hinzufügen</button>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Adresse:</span>
                                <div class="form-value">
                                    <button class="add-btn">Hinzufügen</button>
                                </div>
                            </div>

                            <div class="form-row">
                                <span class="form-label">Instagram:</span>
                                <div class="form-value">
                                    <button class="add-btn">Hinzufügen</button>
                                </div>
                            </div>
                        </div>

                        <div class="right-column">
                            <div class="promo-card">
                                <div class="countdown">
                                    <div class="countdown-number">22</div>
                                    <div class="countdown-label">Tage</div>
                                </div>
                                <h3 class="promo-header">KOSTENLOS FÜR 30 TAGE</h3>
                                <p class="promo-text">Keine Eile! Sie haben Zeit, unsere erstaunlichen Funktionen zu erkunden und sich zu entscheiden.</p>
                                <p class="promo-text">Wenn es Ihnen bereits gefallen hat, brauchen Sie nicht zu warten.</p>
                                <button class="promo-cta">STARTEN SIE IHR ABONNEMENT</button>
                            </div>

                            <div class="steps-card">
                                <h3 class="steps-title">Schritte für den Anfang.</h3>
                                <p class="steps-subtitle">Erstellen Sie Ihr Menü ganz einfach, indem Sie die folgenden Schritte befolgen.</p>
                                
                                <div class="step">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <div class="step-text">Fügen Sie Ihr Logo und Ihr Titelbild hinzu. Geben Sie Details zum Ort ein.</div>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <div class="step-text">Erstellen Sie Artikel im Artikelbestand. <span class="video-icon">▶</span></div>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <div class="step-text">Fügen Sie Ihrem Menü Kategorien und Artikel hinzu.</div>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <div class="step-text">Drucken Sie Ihren QR-Code aus und platzieren Sie ihn.</div>
                                    </div>
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