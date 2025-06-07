<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <svg viewBox="0 0 109 40" fill="none" xmlns="http://www.w3.org/2000/svg" height="30">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M72.572 17.015c-.904-.527-1.986-.805-3.24-.833l-2.284-.05c-.904-.028-1.214-.333-1.214-.888 0-.722.723-1.222 1.903-1.222 1.347 0 2.45.472 3.296 1.416l1.764-1.722c-1.125-1.277-2.76-1.916-5.032-1.916-2.76 0-4.608 1.583-4.608 3.888 0 1.694 1.18 2.944 3.268 3.027l2.256.056c.848.027 1.18.36 1.18.944 0 .805-.933 1.333-2.34 1.333-1.57 0-2.76-.555-3.606-1.666l-1.847 1.777c1.263 1.472 3.155 2.222 5.48 2.222 2.873 0 4.776-1.5 4.776-3.944 0-1.75-1.07-2.888-2.76-3.022l.008-.4zm5.288-9.57c-1.07 0-1.932.861-1.932 1.916 0 1.056.862 1.917 1.932 1.917s1.932-.86 1.932-1.917c0-1.055-.861-1.916-1.932-1.916zm1.542 5.376h-3.099v10.556h3.099V12.82zm5.596-4.305h-3.098v14.861h3.098V8.515zm4.945-.028h-3.099v14.89h3.1V8.487zm10.171 4.278c-2.068 0-3.635.777-4.622 2.194V12.82h-3.043v10.556h3.099v-5.75c0-2.055 1.18-3.25 2.985-3.25 1.625 0 2.589 1 2.589 2.833v6.167h3.099v-6.75c0-2.972-1.82-4.861-4.107-4.861zm-71.31 2.888c0-1.5-1.041-2.5-2.65-2.5h-3.775v8.222h1.68v-2.805h1.848l1.764 2.805h1.932l-1.987-3.11c.82-.334 1.18-.972 1.18-2.611h.008zm-4.745 1.389v-2.445h2.095c.709 0 1.097.416 1.097 1.25 0 .777-.388 1.194-1.097 1.194h-2.095zm8.406-3.889h-1.68v8.222h1.68v-8.222zm16.993-3.388h-6.82v11.61h6.82v-1.444h-5.14v-3.722h4.414v-1.444h-4.414v-3.527h5.14V9.765zM34.61 12.82h-2.286l-2.872 7.222-3.184-7.222h-2.396l4.607 10.556h1.596L34.61 12.82zm4.132 0h1.68v8.222h-1.68V12.82z" fill="#008060"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.783 7.417c-.084-.61-.61-1.032-1.22-1.032-.034 0-.068 0-.101.008a.275.275 0 0 0-.16-.05H14.21a.278.278 0 0 0-.185.069 1.238 1.238 0 0 0-1.228-.916c-.693 0-1.253.554-1.261 1.24 0 .034 0 .076.008.11-.05.016-.084.058-.084.108v7.25c0 .05.034.092.084.108 0 0 2.422 1.744 5.31 1.375l.862-.152c.75-.126 1.337-.706 1.514-1.446l5.47-9.44a.117.117 0 0 0 .084-.11c0-.042-.017-.084-.05-.11l.05-.014z" fill="#008060"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.547 7.417l-.84.152-4.54 7.84c-.168.3-.51.417-.828.3a2.017 2.017 0 0 1-.185-.068v.026s-.693-.27-.693-.27c-.42-.16-.862-.185-1.303-.067l-2.42.9c-.118 1.968 1.303 2.592 2.05 2.732.185.034.404.059.639.076.32 0 .706-.034 1.134-.135l.861-.152c.752-.135 1.338-.706 1.514-1.446l5.47-9.44c.218-.539-.386-1.09-.859-.448z" fill="#95BF47"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.547 7.417l-.84.152c-.05.008-.092.025-.134.042l-1.71 2.953-2.873 4.954a.797.797 0 0 1-.828.3v.026s-.693-.27-.693-.27a2.533 2.533 0 0 0-1.303-.067l2.42-.9c.303-.11.58-.27.824-.47 1.064-.87 1.782-2.22 2.114-3.276.16-.505.896-3.02.896-3.02.076-.278.303-.414.605-.414h1.515c.05 0 .1-.017.134-.043a.129.129 0 0 0-.043.033z" fill="#5E8E3E"/>
                <path d="M15.037 12.718c-.42-.16-.861-.185-1.303-.067h-.008c-.034-.244-.118-.506-.252-.768-.42-.803-1.134-1.257-1.975-1.257h-.084l3.622 2.092z" fill="#5E8E3E"/>
            </svg>
        </div>
        
        <div id="email-step">
            <h1>Einloggen</h1>
            <p class="subtitle">Weiter zu Menunow</p>

            <?php if (!empty($_SESSION['error_message'])): ?>
                <div class="form-error">
                    <?= htmlspecialchars($_SESSION['error_message']) ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            
            <form method="POST" action="../public/login.php" id="login-form">
                <div class="email-container">
                    <label for="username">E-Mail</label>
                    <input type="text" name="username" id="username" required value="<?= htmlspecialchars($_SESSION['old_username'] ?? '') ?>">
                    <button type="button" id="continue-btn">Mit E-Mail fortfahren</button>
                </div>
                
                <div class="password-container" id="password-step">
                    <button type="button" id="password-back">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 12.5L5.5 8L10.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        E-Mail-Adresse ändern
                    </button>
                    <label for="password">Passwort</label>
                    <input type="password" name="password" id="password" required>
                    <button type="submit" class="active">Einloggen</button>
                </div>
            </form>

            <div class="forgot-password hidden" id="forgot-password-link">
                <a href="#">Passwort vergessen?</a>
            </div>

            <div class="divider">
                <span>o</span>
            </div>
            
            <div class="signup">
                Neu bei MenuNow? <a href="#">Fange gleich an →</a>
            </div>
            
            <div class="footer">
                <a href="#">Hilfe</a>
                <a href="#">Datenschutz</a>
                <a href="#">AGB</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emailStep = document.getElementById('email-step');
            const usernameInput = document.getElementById('username');
            const passwordStep = document.getElementById('password-step');
            const continueBtn = document.getElementById('continue-btn');
            const backBtn = document.getElementById('password-back');
            const keyAccess = document.getElementById('key-access');
            const forgotPassword = document.getElementById('forgot-password-link');
            
            // Enable continue button when email is entered
            usernameInput.addEventListener('input', function() {
                if (usernameInput.value.trim() !== '') {
                    continueBtn.classList.add('active');
                } else {
                    continueBtn.classList.remove('active');
                }
            });
            
            // Show password step when continue is clicked
            continueBtn.addEventListener('click', function() {
                if (usernameInput.value.trim() !== '') {
                    document.querySelector('.email-container').style.display = 'none';
                    passwordStep.style.display = 'block';

                    // Mostra il link "Password dimenticata?" e nasconde "Accedi con una chiave di accesso"
                    keyAccess.classList.add('hidden');
                    forgotPassword.classList.remove('hidden');
                }
            });

            // Go back to email step
            backBtn.addEventListener('click', function() {
                document.querySelector('.email-container').style.display = 'block';
                passwordStep.style.display = 'none';

                // Mostra "Accedi con una chiave di accesso", nasconde "Password dimenticata?"
                keyAccess.classList.remove('hidden');
                forgotPassword.classList.add('hidden');
            });

        });

        // Se la sessione PHP ha un errore, mostra direttamente la password view
            <?php if (!empty($_SESSION['old_username'])): ?>
                document.querySelector('.email-container').style.display = 'none';
                document.getElementById('password-step').style.display = 'block';
                document.getElementById('forgot-password-link').classList.remove('hidden');
            <?php endif; ?>

    </script>
</body>
</html>
<?php unset($_SESSION['old_username']); ?>
