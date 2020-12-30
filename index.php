<?php
	session_start();
	require_once __DIR__ . "/php/config.php";
    include DIR_UTIL . "sessionUtil.php";

    if (isLogged()){
		    header('Location: ./main.php');
		    exit;
    }
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name = "author" content = "Luca Rastrelli">
		<meta name = "keywords" content = "music, learning, language, musica">
		<link rel="shortcut icon" type="image/x-icon" href="./css/img/logo.ico"/>
		<link rel="stylesheet" href="./css/landl.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/footer.css" type="text/css" media="screen">		
		<link rel="stylesheet" href="./css/index.css" type="text/css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<title>LandL</title>
	</head>

	<body>
		<header>
			<div class="header">
				<a href="./main.php" title="LandL">
					<img src="./css/img/Logo.png" alt="LandL" class="logo">
				</a> 
			</div>
		</header>
		</div>
		<div class="authentication_column">
			<?php
				if (isset($_GET['errorMessage'])){
					echo '<div class="error">';
					echo '<span>' . $_GET['errorMessage'] . '</span>';
					echo '</div>';
				}
			?>
			<form name="login" action="./php/login.php" method="post" id="login_form" class="box">
					<h2 class="sect-title">SEI GIÀ REGISTRATO?</h2>
						<div class="form-group">
							<label for="username"></label>
								<input type="text" id="username" name="username_in" class="form-control" placeholder="Nome utente" required>
						</div>

				<div class="form-group">
					<label for="password"></label>
						<input type="password" id="password" name="password_in" class="form-control" autocomplete="off" placeholder="Password" required>
				</div>

				<button type="submit" id="submit_login" name="Submit_Login" class="sub_btn">
					<span id="login_element" class="button_icon">ACCEDI</span>
				</button>
			</form>
			<form name="registrazione" action="./signup.php" method="post" id="signup_account" class="box">
				<br>Oppure</br>
				<button type="submit" id="submit_signup" name="submin_signup" class="sub_btn">
					<span id="signup_element" class="button_icon">REGISTRATI</span>
				</button>
			</form>
		</div>
	</div>			
	<?php
		include DIR_LAYOUT . "footer.php";
		
	?>

	</body>
</html>