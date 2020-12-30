<?php
	require_once __DIR__ . "/php/config.php";
	session_start();
	include DIR_UTIL . "sessionUtil.php";
	require_once DIR_UTIL . "songManagerDb.php";

		if (!isLogged()){
		    header('Location: ./index.php');
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
		<link rel="stylesheet" href="./css/footer.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/landl.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/user_bar.css" type="text/css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<title>LandL</title>
	</head>

	<body>
		<?php
			include DIR_LAYOUT . "user_bar.php";
		?>

		<div class="funzioni">
			<div class="column_item">
				<a id="allenamento" href="./allenamento.php?offset=0&name_filter=artista&order=asc">
					<img src="./css/img/allenamento.jpg" alt="Allenamento" class="img_function">
				</a>
			</div>
			<div class="column_item">
				<a id="sfida" href="./utenti.php">
					<img src="./css/img/utenti.jpg" alt="Utenti" class="img_function">
				</a>
			</div>
			<div class="column_item">
				<a id="statistiche" href="./statistiche.php">
					<img src="./css/img/statistiche.jpg" alt="Statistiche" class="img_function">
				</a> 
			</div>
		</div>
		<?php
			if($_SESSION['username'] == 'admin') {
				echo 	'<div class="admin">';
				echo		'<div class="admin_item">';
				echo			'<a id="admin" href="./admin.php">';
				echo 				'<span>Amministrazione</span>';
				echo			'</a>';
				echo		'</div>';
				echo	'</div>';
			}
		?>
		<?php
			include DIR_LAYOUT . "footer.php";
		?>
	</body>
</html>