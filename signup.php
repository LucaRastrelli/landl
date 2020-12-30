<?php
	require_once __DIR__ . "/php/config.php";
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name = "author" content = "Luca Rastrelli">
		<meta name = "keywords" content = "music, learning, language, musica">
		<link rel="shortcut icon" type="image/x-icon" href="./css/img/logo.ico"/>
		<link rel="stylesheet" href="./css/user_bar.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/landl.css" type="text/css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<title>LandL</title>
	</head>


	<body>
		<?php
			include DIR_LAYOUT . "user_bar.php";
		?>


		<main>
			<div id="main_content" class="principal-content">
				<div class="padded-container">
					<h1 class="page-title">Crea un account</h1>

					<?php
						if (isset($_GET['errorMessage'])){
							echo '<div class="error">';
							echo '<span>' . $_GET['errorMessage'] . '</span>';
							echo '</div>';
						}
					?>

					<form name="registration" action="./php/registrazione.php" method="post" id="register_account_form" class="signup-form">
						<fieldset>
							<h2 class="title-box">I tuoi dati personali</h2>
							<div class="box">

								<p class="row">
									<label for="nome">Nome</label>
									<input type="text" name="nome" id="nome" class="signup-control" pattern="[a-zA-Z'&agrave;&ograve;&egrave;&igrave;&ugrave;\s]+" autofocus="" required>
								</p>

								<p class="row">
									<label for="cognome">Cognome</label>
									<input type="text" name="cognome" id="cognome" class="signup-control" pattern="[a-zA-Z'&agrave;&ograve;&egrave;&igrave;&ugrave;\s]+" required>
								</p>

								<p class="row">
									<label for="username">Nome Utente</label>
									<input type="text" name="username" id="username" class="signup-control" pattern="^[a-zA-Z0-9_]+$" required>
								</p>

								<p class="row"><label for="email">Email</label><input type="email" id="email" placeholder="aaaa@sssss.it" name="email" class="signup-control" required></p> 
								
								<p class="row">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="signup-control" autocomplete="off" required>
								</p>

								<p class="row">
									<label for="Conf_passwd">Conferma Password</label>
									<input type="password" name="Conf_passwd" id="Conf_passwd" class="signup-control" required>
								</p>

								<div class="legal-privacy">
									<input type="checkbox" name="privacy_check" required>
									Dichiaro di aver letto, compreso e accettato l'<a href="./html/privacy.html" target="_blank">informativa sulla privacy</a>
								</div>
							</div>
						</fieldset>

						<input type="submit" id="Submit_New_Account" name="Submit_New_Account" class="signup_btn" value="Iscriviti">
					</form>
				</div>
			</div>
		</main>
	</body>
</html>