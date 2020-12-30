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
		<link rel="stylesheet" href="./css/statistiche.css" type="text/css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<title>LandL</title>
	</head>
		<?php
			include DIR_LAYOUT . "user_bar.php";
		?>
	<body>
		<?php
			if(!isset($_GET['utente']))
				$username = $_SESSION['username'];
			else {
				if($landlDb->checkUser($_GET['utente'])==1)
					$username = $_GET['utente'];
				else {
					$username = 'NULL';
				}
			}
		?>
		<div id="stats" class="info">
			<h1 class="page-title">Statistiche di <?php echo $username ?></h1>
			<?php
				if ($username == 'NULL'){
					echo '<div class="error">';
					echo '<span>Utente non esistente</span>';
					echo '</div>';
				}
			?>
		<table class="stats_table">
			<tr>
				<th>Partite</th>
				<td><?php
					$result = $landlDb->getStats($username);
					echo $result['allenamenti'];
				?>
				</td>
			</tr>
			<tr>
				<th>Risposte Corrette</th>
				<td><?php
					echo $result['corrette'];
				?>
				</td>
			</tr>
			<tr>
				<th>Risposte Errate</th>
				<td><?php
					echo $result['errate'];
				?>
				</td>
			</tr>
			<tr>
				<th>Percentuale Risposte Corrette</th>
				<td><?php
					$corrette = $result['corrette'];
					$allenamenti = $result['allenamenti'];
					if($allenamenti != 0) {
						$percentuale = round($corrette * 100 / $allenamenti);
						echo $percentuale;
						echo '%';
					}
					else
						echo '0%';
				?>
				</td>
			</tr>
			<tr>
				<th>Iscritto dal</th>
				<td><?php
					echo $result['iscrizione'];
				?>
				</td>
			</tr>
		</table>
		<div class="back_link">
			<?php
				if(isset($_GET['utente']))
					echo "<a href='./utenti.php'>";
				else
					echo "<a href='./main.php'>";
			?>
			<i class="left_arrow"></i>
				<p>Torna indietro</p>
			</a>
		</div>
		<?php
			include DIR_LAYOUT . "footer.php";
		?>
	</body>
</html>