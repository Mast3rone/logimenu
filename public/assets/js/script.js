

// global functions
function request(url, data, callback) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', url, true);
	var loader = document.createElement('div');
	loader.className = 'loader';
	document.body.appendChild(loader);
	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState === 4) {
			if(callback) {
				callback(xhr.response);
			}
			loader.remove();
		}
	});

	var formdata = data ? (data instanceof FormData ? data : new FormData(document.querySelector(data))) : new FormData();

	var csrfMetaTag = document.querySelector('meta[name="csrf_token"]');
	if(csrfMetaTag) {
		formdata.append('csrf_token', csrfMetaTag.getAttribute('content'));
	}

	xhr.send(formdata);
}


// index.php
function logout() {
	request('php/logout.php', false, function(data) {
		if(data === '0') {
			window.location = 'login';
		}
	});
}
function deleteAccount() {
	request('php/deleteAccount.php', false, function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':
				window.location = 'register';
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to delete account. Please try again later.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div class="err">You are not logged in.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// login.php
function login() {
	request('php/login.php', '#loginForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':
				window.location = './';
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Nome utente o password errato</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Impossibile connettersi. Per favore riprova più tardi.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Hai superato il numero massimo di tentativi di accesso all ora. Riprova tra un ora.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">La tua email non è stata convalidata. Controlla la tua casella email per convalidarla o <a href="./verifica">fai clic qui</a> per inviare una nuova email di conferma.</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// aggiungicard.php
function aggiungicard() {
    request('php/aggiungicard.php', '#CardForm', function(responseText) {
        document.getElementById('errs').innerHTML = "";
        var transition = document.getElementById('errs').style.transition;
        document.getElementById('errs').style.transition = "none";
        document.getElementById('errs').style.opacity = 0;

        let data;
        try {
            data = JSON.parse(responseText);
        } catch (e) {
            document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Errore di parsing della risposta dal server.</div>';
            return;
        }

        if (data.length > 0) {
            data.forEach((error) => {
                switch(error) {
                    case 0:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-success" style="Opacity:1" role="alert">Card aggiunta con successo! Aggiorna la pagina per visualizzare la nuova card.</div>';
                        document.getElementById('CardForm').reset();
                        break;
                    case 1:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1" role="alert">Il Codice di Acquisto non è disponibile o è già stato acquistato.</div>';
                        break;
                    case 2:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Errore. Per favore riprova più tardi.</div>';
                        break;
                    case 3:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1" role="alert">Impossibile connettersi. Per favore riprova più tardi.</div>';
                        break;
                    case 4:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1" role="alert">Token CSRF non valido. Per favore riprova più tardi.</div>';
                        break;
                    default:
                        document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
                }
            });
        } else {
            document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" role="alert">Risposta non valida dal server.</div>';
        }

        setTimeout(function() {
            document.getElementById('errs').style.transition = transition;
            document.getElementById('errs').style.opacity = 1;
        }, 10);
    });
}

// register.php
function register() {
	request('php/register.php', '#registerForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		try {
			data = JSON.parse(data);
			if(!(data instanceof Array)) {throw Exception('bad data');}

			//Show errors to user
			for(var i = 0;i < data.length;++i) {
				switch(data[i]) {
					case 0:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-success" style="Opacity:1"role="alert">Il tuo account è stato creato! Convalida la tua email controllando la tua casella di posta per un collegamento di convalida prima di accedere.</div>'; 
						document.getElementById('registerForm').reset();
						break;
					case 1:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">È stato inserito un nome non valido. (usa solo lettere, spazi e trattini)</div>'; 
						break;
					case 2:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Email non valida.</div>'; 
						break;
					case 3:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">L Email non esiste. (Questo dominio non ha un mail server)</div>'; 
						break;
					case 4:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">La password deve contenere: <ul><li>Almeno 8 caratteri</li><li>Almeno una lettera minuscola</li><li>Almeno una lettera maiuscola</li><li>Almeno una numero</li><li>Almeno un carattere speciale (~?!@#$%^&*)</li></ul></div>'; 
						break;
					case 5:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Le password non corrispondono.</div>'; 
						break;
					case 6:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert"Impossibile aggiungere l account al database. Per favore riprova più tardi.</div>'; 
						break;
					case 7:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Esiste già un account con questa email.</div>'; 
						break;
					case 8:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile connettersi. Per favore riprova più tardi.</div>'; 
						break;
					case 9:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Token CSRF non valido. Per favore riprova più tardi.</div>'; 
						break;
					case 10:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inviare l Email. Per favore riprova più tardi.</div>'; 
						break;
					case 11:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inserire la richiesta nel database. Per favore riprova più tardi.</div>'; 
						break;
					case 12:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Hai superato il numero di richieste di convalida consentite al giorno.</div>'; 
						break;
					case 13:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">L utente con questa email è già convalidato</div>'; 
						break;
					case 14:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Un utente con questa email non esiste</div>'; 
						break;
					case 15:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile connettersi. Per favore riprova più tardi.</div>';
						break;
					case 16:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Il Codice di Acquisto non è disponibile o è già stato acquistato.</div>';
						break;
					case 17:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Devi accettare i Termini e le Condizioni prima di proseguire.</div>';
						break;							
					default:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
				}
			}
		}
		catch(e) {
			document.getElementById('errs').innerHTML = '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// validateEmail.php
function sendValidateEmailRequest() {
	request('php/sendValidationEmail.php', '#validateEmailForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;

		switch(data) {
			case '0':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-success" style="Opacity:1"role="alert">E-mail inviata... Controlla la tua e-mail e fai clic sul collegamento nell e-mail per convalidare la tua e-mail.</div>';
				document.getElementById('validateEmailForm').reset();
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inviare l e-mail. Per favore riprova più tardi.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inserire la richiesta nel database. Per favore riprova più tardi.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Hai superato il numero di richieste di convalida consentite al giorno.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">L utente con questa email è già convalidato.</div>';
				break;
			case '5':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Un utente con questa email non esiste.</div>';
				break;
			case '6':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile connettersi al server. Per favore riprova più tardi.</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}


// resetPassword.php
function passwordResetRequest() {
	request('php/passwordResetRequest.php', '#resetPasswordForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;

		switch(data) {
			case '0':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-success" style="Opacity:1"role="alert">È stata inviata un e-mail, se esiste un account con questa e-mail.</div>';

				document.getElementById('resetPasswordForm').reset();
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inviare l e-mail. Per favore riprova più tardi.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile inserire la richiesta nel database. Per favore riprova più tardi.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Hai superato il numero di richieste di ripristino consentite al giorno. Riprovare più tardi.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile connettersi al server. Per favore riprova più tardi.</div>';
				break;
			case '5':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Token non valido.</div>';
				break;
			case '6':
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Inserisci una email.</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore. Per favore riprova più tardi.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}


function changePassword() {

	// Get the meta tag with the name attribute 'baseUrl'
const baseUrlMetaTag = document.querySelector('meta[name="baseUrl"]');
const baseUrl = baseUrlMetaTag.getAttribute('content');
// Log the base URL to the console
	request(baseUrl+'php/changePassword.php', '#changePasswordForm', function(data) {

		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		try {
			data = JSON.parse(data);
			if(!(data instanceof Array)) {throw Exception('bad data');}

			//Show errors to user
			for(var i = 0;i < data.length;++i) {
				switch(data[i]) {
					case 0:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-success" style="Opacity:1"role="alert">La tua password è stata resettata! Ora puoi <a href="././login">accedere</a></div>';
						document.getElementById('changePasswordForm').reset();
						break;
					case 1:
					case 2:
					case 7:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Richiesta di reimpostazione della password non valida. Se si tratta di un errore, invia una nuova richiesta e fai clic sul collegamento nell e-mail.</div>';
						break;
					case 3:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">La password deve contenere: <ul><li>Almeno 8 caratteri</li><li>Almeno una lettera minuscola</li><li>Almeno una lettera maiuscola</li><li>Almeno una numero</li><li>Almeno un carattere speciale (~?!@#$%^&*)</li></ul></div>'; 
						break;
					case 4:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Le passwords non corrispondono. Inserisci nuovamente la password confermata.</div>'; 
						break;
					case 5:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile aggiornare la password nel database. Per favore riprova più tardi.</div>'; 
						break;
					case 6:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Questa richiesta di reimpostazione della password è scaduta. Per favore invia un altra email.</div>'; 
						break;
					case 8:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Impossibile connettersi al Server. Per favore riprova più tardi.</div>';
						break;
					case 9:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Token non valido, riprova più tardi.</div>';
						break;
					default:
						document.getElementById('errs').innerHTML += '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore sconosciuto. Per favore riprova più tardi.</div>';
				}
			}
		}
		catch(e) {
			document.getElementById('errs').innerHTML = '<div id="errore" class="alert alert-danger" style="Opacity:1"role="alert">Si è verificato un errore sconosciuto. Per favore riprova più tardi.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
	
}



