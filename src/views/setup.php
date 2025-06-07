<?php
// Se arriva un messaggio di errore dalla logica PHP, lo mostriamo
if (isset($errorMessage)) {
    echo '<div class="alert alert-danger">' . htmlspecialchars($errorMessage) . '</div>';
}

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuNow - Dashboard">
        <meta name="keywords" content="menunow,menunowdashboard">
        <meta name="author" content="Mast3r">

        <title>MenuNow - Setup</title>

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
    </head>
    <body class="no-loader sidebar-hidden">
        <div class="page-container">
          <div class="page-header">
            <nav class="navbar navbar-expand-lg d-flex justify-content-between">
              <div class="" id="navbarNav">
                <ul class="navbar-nav" id="leftNav">

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
            <?php
if (isset($errorMessage) && $errorMessage) {
    echo '<div class="alert alert-danger">' . htmlspecialchars($errorMessage) . '</div>';
}
?>
            <div class="page-content">
            <div class="main-wrapper">
              <div class="card p-4 mt-5" style="border-radius: 16px;">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #118ab2;">
                  <i class="fas fa-store text-white"></i>
                </div>
                <h4 class="mb-0 ms-3 fw-bold">Neuen Standort erstellen</h4>
                </div>
              <p>Gib die Details ein, um einen neuen Standort oder ein neues Geschäft anzulegen.</p>

              <form method="POST" action="setup.php">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Name des Standorts</label>
                    <input type="text" class="form-control" placeholder="Name des Standorts" id="placeName" name="place_name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Link (URL)</label>
                    <div class="d-flex">
                      <span class="input-group-text bg-light border-end-0">menuviel.com/</span>
                      <input type="text" class="form-control border-start-0" placeholder="dein-standort" id="urlSlug" name="url_slug" required>
                    </div>
                    <small class="form-text text-muted">Der Link wird automatisch erstellt, kann aber geändert werden.</small>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Währung</label>
                    <select class="form-select" name="currency" required>
                      <option selected disabled>Bitte wählen</option>
                      <option value="EUR">EUR - Euro</option>
                      <option value="CHF">CHF - Schweizer Franken</option>
                      <option value="GBP">GBP - Pfund</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Hauptsprache</label>
                    <select class="form-select" name="main_language" required>
                      <option selected disabled>Bitte wählen</option>
                      <option value="de">Deutsch</option>
                      <option value="it">Italienisch</option>
                      <option value="en">Englisch</option>
                      <option value="fr">Französisch</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary px-4">Erstellen</button>
                </div>
              </form>
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
    </body>

    <script>
  document.getElementById('placeName').addEventListener('input', function () {
    const slug = this.value
      .toLowerCase()
      .replace(/\s+/g, '-')         // spazi → trattini
      .replace(/[^\w\-]+/g, '')     // rimuove caratteri speciali
      .replace(/\-\-+/g, '-')       // doppio trattino → singolo
      .replace(/^-+|-+$/g, '');     // rimuove trattini iniziali/finali
    document.getElementById('urlSlug').value = slug;
  });
</script>


</html>