<?php
	require_once __DIR__ . "/php/config.php";
	session_start();
	include DIR_UTIL . "sessionUtil.php";
	require_once DIR_UTIL . "songManagerDb.php";
	require_once DIR_UTIL . "dbManager.php";

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
		<link rel="stylesheet" href="./css/user_bar.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/landl.css" type="text/css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<script type="text/javascript" src="./js/ajax/UserLoader.js"></script>
		<script type="text/javascript" src="./js/ajax/UserDashboard.js"></script>
		<script type="text/javascript" src="./js/ajax/AjaxManager.js"></script>
		<script type="text/javascript" src="./js/ajax/UserEventHandler.js"></script>
		<script type="text/javascript" src="./js/ajax/SongLoader.js"></script>
		<script type="text/javascript" src="./js/ajax/SongDashboard.js"></script>
		<title>LandL</title>
	</head>

		<?php 
			include DIR_LAYOUT . "user_bar.php";
		?>
			<body onload="UserLoader.loadData()">
			<div id="users" class="info">
				<h1 class="page-title">Utenti</h1>
				
			<div id="search_user" class="search">
			<i class="search_icon"></i>
		<?php
			echo '<input id="search" type="text" placeholder="Cerca utenti" onkeyup="UserLoader.search(this.value)">';?>
			</div>
			<div id="userDashboard" class="user_dashboard"></div>
			
		<?php
			include DIR_LAYOUT . "footer.php";
		?>
	</body>
</html>