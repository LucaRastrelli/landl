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
		<link rel="stylesheet" href="./css/landl.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/user_bar.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/footer.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/allenamento.css" type="text/css" media="screen">
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

	<body>
		<?php
			$offset = $_GET['offset'];
			$name_filter = $_GET['name_filter'];
			$order = $_GET['order'];
		?>
		<?php
			include DIR_LAYOUT . "user_bar.php";
			
			echo '<body onload="SongLoader.loadData('.$offset.',\''.$name_filter.'\',\''.$order.'\')">';
		?>
		<div id="training" class="info">
			<h1 class="page-title">Allenamento</h1>

		
			<div id="filter">
				<p>Filtra:</p>
				<form class="form" id="filter_form" action="./allenamento.php">
					<select name="offset" style="display: none;">
						<option value="0"></option>
					</select>
					<select name="name_filter">
						<?php
							if(isset($_GET['name_filter']) && $_GET['name_filter'] == "artista"){
								echo'<option value="artista">Nome Artista</option>';
								echo'<option value="nome">Nome Canzone</option>';
								echo'<option value="difficolta">Difficoltà</option>';
							}else if(isset($_GET['name_filter']) && $_GET['name_filter'] == "nome"){
								echo'<option value="nome">Nome Canzone</option>';
								echo'<option value="artista">Nome Artista</option>';
								echo'<option value="difficolta">Difficoltà</option>';
							}else if(isset($_GET['name_filter']) && $_GET['name_filter'] == "difficolta"){
								echo'<option value="difficolta">Difficoltà</option>';
								echo'<option value="artista">Nome Artista</option>';
								echo'<option value="nome">Nome Canzone</option>';
							}
						?>
					</select>
					<select name="order">
						<?php
							if(isset($_GET['order']) && $_GET['order'] == "asc"){
								echo'<option value="asc">Crescente</option>';
								echo'<option value="desc">Decrescente</option>';
							}else if(isset($_GET['order']) && $_GET['order'] == "desc"){
								echo'<option value="desc">Decrescente</option>';
								echo'<option value="asc">Crescente</option>';
							}
						?>
						</select>
						<input type="submit" value="Filtra" id="filtro">
					</form>
				</div>
		</div>
		<div id="search_song" class="search">
			<i class="search_icon"></i>
		<?php
			echo '<input id="search" type="text" placeholder="Cerca canzoni" onkeyup="SongLoader.search(this.value, '.$offset.')">';
		?>
		</div>
		<div id="songDashboard" class="song_dashboard"></div>

		<?php
			include DIR_LAYOUT . "footer.php";
		?>
	</body>
</html>