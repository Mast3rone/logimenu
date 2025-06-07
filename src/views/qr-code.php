<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuNow - Dashboard">
        <meta name="keywords" content="menunow,menunowdashboard">
        <meta name="author" content="Mast3r">

        <title>MenuNow - <?= $t['page_title_qrcode'] ?></title>

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
                        <a href="./languages.php"><i data-feather="globe"></i><?= $t['language'] ?></a>
                    </li>
                    <li>
                        <a href="./"><i data-feather="menu"></i><?= $t['menu'] ?></a>
                    </li>
                    <li>
                        <a href="./"><i data-feather="coffee"></i><?= $t['inventory'] ?></a>
                    </li>
                    <li>
                        <a href="./qr-code.php" style="color: #118ab2 !important;"><i style="color: #118ab2 !important;" data-feather="code"></i><?= $t['qr_code'] ?></a>
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
                    <div class="qr-section">
                        <div class="qr-header">
                                  <div class="language-icon">
                                      <i class="fas fa-qrcode"></i>
                                  </div>
                                  <div>
                                      <h1 class="language-title">QR-Code</h1>
                                  </div>
                              </div>
                        
                        <p class="qr-description">
                            <?= $t['qrcode_txt'] ?>
                        </p>
                        
                        <div class="qr-display-section">
                            <div class="qr-content">
                                <div class="url-section">
                                    <div class="url-label">Link (URL)</div>
                                    <div class="url-description">
                                        <?= $t['qrcode_txt2'] ?>
                                    </div>
                                    
                        <div class="url-input-group">
                            <span class="url-prefix">menuviel.com/</span>
                            <input type="text" class="url-input" value="<?= htmlspecialchars($linkslug) ?>" id="urlInput"
                                <?= !empty($slug_blocked) && $slug_blocked ? 'disabled' : '' ?>
                                data-blocked="<?= !empty($slug_blocked) && $slug_blocked ? '1' : '0' ?>"
                                data-blocked-until="<?= htmlspecialchars($slug_blocked_until) ?>"
                            >
                        </div>
                        <?php if (!empty($slug_blocked) && $slug_blocked): ?>
                            <div class="text-danger mt-2" id="slugBlockedMsg">
                                <?= sprintf(($t['slug_blocked_until'] ?? $t['qr-bloccato']) . ': %s', htmlspecialchars($slug_blocked_until)) ?>
                            </div>
                        <?php endif; ?>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <button class="save-btn"><?= $t['qrcode_save'] ?></button>
                                        <div class="qr-info">
                                            <?= $t['qrcode_txt3'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="qr-code-container">
                                <div class="qr-code-box" id="qrCodeBox">
                                    <div class="qr-placeholder">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=https://menuviel.com/menu/<?= urlencode($linkslug) ?>" alt="QR Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal-backdrop" id="qrModal">
            <div class="modal-content-custom">
                <div class="modal-header-custom">
                    <h3 class="modal-title">QR Code - <?= htmlspecialchars($localeName) ?></h3>
                    <button class="close-btn" id="closeModal">&times;</button>
                </div>
                
                <div class="modal-qr-container">
                    <div class="modal-qr-code">
                        <div class="modal-qr-placeholder">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=280x280&data=https://menuviel.com/menu/<?= urlencode($linkslug) ?>" alt="QR Code">
                    </div>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button id="downloadQrBtn" class="modal-btn download-btn">
                        <i data-feather="download"></i>
                        <?= $t['qrcode_dwnld'] ?>
                    </button>

                    <button id="shareQrBtn" class="modal-btn share-btn">
                        <i data-feather="share-2"></i>
                        <?= $t['qrcode_share'] ?>
                    </button>
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
    // Initialize Feather Icons
    feather.replace();
    
    // Modal functionality
    const qrCodeBox = document.getElementById('qrCodeBox');
    const qrModal = document.getElementById('qrModal');
    const closeModal = document.getElementById('closeModal');
    
    // Open modal when QR code is clicked
    qrCodeBox.addEventListener('click', function() {
        qrModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
    
    // Close modal when close button is clicked
    closeModal.addEventListener('click', function() {
        qrModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
    
    // Close modal when backdrop is clicked
    qrModal.addEventListener('click', function(e) {
        if (e.target === qrModal) {
            qrModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && qrModal.style.display === 'flex') {
            qrModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Re-initialize feather icons after modal opens
    qrCodeBox.addEventListener('click', function() {
        setTimeout(() => {
            feather.replace();
        }, 100);
    });

    // Download QR Code
    document.getElementById('downloadQrBtn').addEventListener('click', function() {
        const linkslug = '<?= htmlspecialchars($linkslug) ?>';
        const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=280x280&data=https://menuviel.com/menu/${encodeURIComponent(linkslug)}`;

        fetch(qrUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.blob();
            })
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = `QRCode_${linkslug}.png`;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            })
            .catch(err => {
                showAlert('error', '<?= $t['download_error'] ?>: ' + err.message);
            });
    });

    // Save Slug functionality
        document.querySelector('.save-btn').addEventListener('click', function() {
        const newSlug = document.getElementById('urlInput').value.trim();
        const saveBtn = this;
        
        if (!newSlug) {
            showAlert('error', '<?= $t['qrcode_empty_slug'] ?>');
            return;
        }
        
        // Validate slug format
        if (!/^[a-z0-9-]+$/i.test(newSlug)) {
            showAlert('error', '<?= $t['slug_invalid_chars'] ?>');
            return;
        }
        
        // Disable button during request
        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <?= $t['saving'] ?>';
        
        // Send request to server
        fetch('qr-code.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest' // <-- aggiungi questa riga per forzare risposta JSON
            },
            body: 'new_slug=' + encodeURIComponent(newSlug)
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
                return;
            }
            return response.json().then(data => {
                if (!response.ok) {
                    throw data;
                }
                return data;
            });
        })
        .then(data => {
            if (data && data.success) {
                updateQrCode(newSlug);
                showAlert('success', '<?= $t['slug_updated'] ?>');
            }
        })
        .catch(errorData => {
            let errorMessage = '<?= $t['unknown_error'] ?>';

            // Mostra la data se presente nel messaggio di errore
            if (errorData && errorData.message) {
                errorMessage = errorData.message;
            }

            showAlert('error', errorMessage);

            // Highlight input field in red
            const input = document.getElementById('urlInput');
            input.style.borderColor = '#F44336';
            input.style.boxShadow = '0 0 0 2px rgba(244, 67, 54, 0.2)';
            setTimeout(() => {
                input.style.borderColor = '';
                input.style.boxShadow = '';
            }, 3000);
        })
        .finally(() => {
            saveBtn.disabled = false;
            saveBtn.textContent = '<?= $t['qrcode_save'] ?>';
        });
    });

    // Update QR Code function
    function updateQrCode(newSlug) {
        // Update all QR code images
        const qrImages = document.querySelectorAll('.modal-qr-placeholder img, .qr-placeholder img');
        qrImages.forEach(img => {
            const size = img.classList.contains('modal-qr-placeholder') ? '280x280' : '180x180';
            img.src = `https://api.qrserver.com/v1/create-qr-code/?size=${size}&data=https://menuviel.com/menu/${encodeURIComponent(newSlug)}`;
        });
        
        // Update preview link
        document.querySelector('.A-1').href = `https://www.menuviel.com/menu/${newSlug}`;
    }

    // Show alert notification
    function showAlert(type, message) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.custom-alert');
        if (existingAlert) {
            existingAlert.remove();
        }
        
        const alert = document.createElement('div');
        alert.className = `custom-alert alert-${type}`;
        alert.innerHTML = `
            <div class="alert-content">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                <span>${message}</span>
                ${type === 'error' ? '<button class="close-alert-btn"><i class="fas fa-times"></i></button>' : ''}
            </div>
        `;
        
        document.body.appendChild(alert);
        
        // Show animation
        setTimeout(() => {
            alert.style.opacity = '1';
            alert.style.transform = 'translateY(0)';
        }, 10);
        
        // Close button functionality
        if (type === 'error') {
            alert.querySelector('.close-alert-btn').addEventListener('click', () => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            });
        }
        
        // Hide after 5 seconds (only for success messages)
        if (type === 'success') {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        }
    }

    // Add alert styles dynamically
    const alertStyle = document.createElement('style');
    alertStyle.textContent = `
        .custom-alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            display: flex;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            font-family: 'Poppins', sans-serif;
            max-width: 400px;
        }
        .alert-success {
            background-color: #4CAF50;
            border-left: 5px solid #2E7D32;
        }
        .alert-error {
            background-color: #F44336;
            border-left: 5px solid #C62828;
        }
        .alert-content {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .alert-content i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .alert-content span {
            font-size: 0.9em;
            flex-grow: 1;
        }
        .close-alert-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-left: 15px;
            padding: 0;
            font-size: 1em;
        }
        .close-alert-btn:hover {
            opacity: 0.8;
        }
    `;
    document.head.appendChild(alertStyle);

    // Show session messages if present
    <?php if (isset($_SESSION['success_message'])): ?>
        showAlert('success', '<?= addslashes($_SESSION['success_message']) ?>');
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error_message'])): ?>
        showAlert('error', '<?= addslashes($_SESSION['error_message']) ?>');
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
</script>
    </body>
</html>