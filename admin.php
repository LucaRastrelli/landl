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
    else if($_SESSION['username'] != 'admin') {
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
	</head>


	<body>
		<?php
			include DIR_LAYOUT . "user_bar.php";
		?>
		<main>
			<div id="admin_container" class="principal_content">
				<h1 class="page-title">Strumenti di amministrazione</h1>
				<?php
					if (isset($_GET['errorMessage'])){
						echo '<div class="error">';
						echo '<span>' . $_GET['errorMessage'] . '</span>';
						echo '</div>';
					}
					if (isset($_GET['successMessage'])){
					echo '<div class="success">';
					echo '<span>' . $_GET['successMessage'] . '</span>';
					echo '</div>';
					}
				?>
				<div class="two-col">
					<div class="column-layout">
						<div class="admin_add_song">
								<h3>Inserisci canzone</h3>
								<form class="add" name='add_song' action="./addSong.php" method="post" enctype="multipart/form-data">

									<label>Artista</label><br>
									<input type="text" placeholder="Nome Artista" name="artist_name" required ><br>

									<label>Nome Canzone</label><br>
									<input type='text' placeholder='Nome Canzone' name='song_name' required><br>

									<label>Album</label><br>
									  <input list="album_name" name="album_name" required>
										  <datalist id="album_name">
										  	<?php
										  		require_once DIR_UTIL . "songManagerDb.php";
										  		$result = loadAlbums();
										  		while($row = $result->fetch_assoc()):;
										  	?>
										  		<option value="<?php echo $row['album'];?>"><?php echo $row['album'];?>
										  		<?php endwhile; ?>
										  </datalist>
									<input type="file" id='album_input' name='album_picture'>
									<p><small>Formato accettato: png (risoluzione consigliata: 1000x1000)</small></p>

									<label>Testo</label><br>
									<textarea id='lyrics_input' placeholder='Inserisci il testo della canzone' name='lyrics' required></textarea><br>

									<label for="difficolta">Difficoltà:</label><br>
  									<input type="number" id="difficolta" name="difficolta" min="1" max="5" required><br>

									<label>File Canzone</label><br>
									<input type="file" id='song_input' name='song_file'>
									<p><small>Formato accettato: mp3 (dimensioni inferiori a: 2MB)</small></p>

									<input type="submit" name='upload_button' value="Inserisci">
								</form>
						</div>
					</div>
					<div class="column-layout">
						<div class="admin_add_song">
								<h3>Rimuovi canzone</h3>
								<form class="remove" name='remove_song' action="./removeSong.php" method="post" enctype="multipart/form-data">

									<label>Artista</label><br>
									<select id="artist_name" name="artist_name" onchange="SongLoader.enableSong()" required>
										<option selected>Nome Artista</option>
										<?php
										  		require_once DIR_UTIL . "songManagerDb.php";
										  		$result = loadArtists();
										  		while($row = $result->fetch_assoc()):;
										  	?>
										  		<option value="<?php echo $row['artista'];?>"><?php echo $row['artista'];?>
										  		<?php endwhile; ?>
									</select><br>

									<label>Nome Canzone</label><br>
									<select id="song_name" name="song_name" disabled required>
										<option selected>Nome Canzone</option>
									</select><br><br>

									<input type="submit" name='remove_button' value="Rimuovi">
								</form>
						</div>
					</div>
		</main>
	</body>