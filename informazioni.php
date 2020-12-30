<?php
	require_once __DIR__ . "/php/config.php";
	session_start();
	//include DIR_UTIL . "sessionUtil.php";
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
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<meta name="description" content="Impara l'inglese ascoltando i tuoi brani preferiti">
		<title>LandL</title>
	</head>

	<body>
		<?php
			include DIR_LAYOUT . "user_bar.php";
		?>

		<div id="funzionalità" class="info">
			<h1 class="page-title">Funzionalità</h1>
			<div class="descrizione">
				<p>Il nome <strong>LandL</strong> deriva dall'unione di tre parole inglesi: Listening and Learning. Lo scopo del sito è proprio quello di permettere l'acquisizione della 
					lingua inglese tramite l'ascolto di canzoni straniere, garantendo così di imparare non solo il lessico, ma anche la giusta pronuncia.<br><br> 

					Per utilizzare il servizio è richiesta la registrazione, verranno chiesti i dati identificativi quali nome, cognome e e-mail. Bisognerà anche scegliere un proprio
					username e una password. L'iscrizione sarà valida se e solo se non esiste nessun altro utente con lo stesso username o con la stessa e-mail.<br><br>

					Una volta iscritti, si avranno a disposizione tre funzioni: Allenamento, Utenti e Statistiche.<br>
					In Allenamento verranno mostrate tutte le canzoni presenti nel sito, 
					le quali saranno catalogate secondo nome dell'artista e nome della canzone. La barra di ricerca e i filtri possono facilitare la scelta della canzone. Esistono due
					difficoltà: facile e difficile. In entrambi i casi l'esercizio prevede l'ascolto della canzone e il riempimento della casella di testo con le parole giuste. 
					Si può ascoltare la canzone un numero di volte indefinito. Ogni volta la parte di testo da 
					indovinare cambia. Quando si risponde, automaticamente verranno aggiornate le proprie statistiche.<br>
					La sezione utente permette di conoscere tutti gli utenti registrati al sito, ogni utente può decidere di "aggiungere" un amico secondo la modalità "follow", ciò
					consente di far comparire gli amici sempre per primi in lista.<br>
					Le statistiche forniscono dati sulle proprie capacità e un riepilogo del proprio account sin dall'iscrizione.<br><br> 

					Se si accede come <i>admin</i> è possibile gestire il database, è consentita sia l'aggiunta che la rimozione delle canzoni. Quando si aggiunge una canzone è necessario
					fornire alcune informazioni quali artista, nome della canzone, album, testo e difficoltà. Se si aggiunge una canzone appartente ad un album già presente, non
					sarà necessario inserire il file dell'album. Per rimuovere una canzone basta indicare l'artista e la canzone.
					Se si elimina una canzone, verrà eseguito automaticamente un controllo sull'album contenente la canzone: se non esiste più nessun'altra canzone di un album allora verrà
					cancellata anche la relativa copertina dell'album dal server.<br><br>

					Nei file del progetto è presente una cartella <i>Prova Canzoni</i> grazie al quale sarà possibile testare le funzionalità di amministratore. Sono state inserite due 
					canzoni, una il cui album è già presente e una completamente nuova. Nel primo caso anche se verrà inserito un nuovo PNG dell'album, questo non verrà considerato.
				</p>
			</div>
		</div>
		
		<div id="contatti" class="info">
			<h1 class="page-title">Contatti</h1>
			<div class="descrizione">	
				<p>È possibile contattarci tramite:</p>
					<ul>
						<li>
							<p>e-mail: <a href="mailto:rastrelli.luca@outlook.it">rastrelli.luca@outlook.it</a></p>
						</li>
						<li>
							<p>telefono: <a href="tel:+393889788615">+39 3889788615</a></p>
						</li>
					</ul>
			</div>
		</div>

		<div id="social" class="info">
			<h1 class="page-title">Social</h1>
			<div class="descrizione">
				<p>Seguici sui social!</p>
					<a id="facebook" href="https://www.facebook.com/rastrelliluca" title="Facebook" target="_blank">
						<img src="./css/img/fbsocial.png" class="social" alt="Facebook">
					</a>

					<a id="twitter" href="https://www.twitter.com/LucaRastrelli98" title="Twitter" target="_blank">
						<img src="./css/img/twitsocial.png" class="social" alt="Twitter">
					</a>

					<a id="instagram" href="https://www.instagram.com/lucarastrelli" title="Instagram" target="_blank">
						<img src="./css/img/instasocial.png" class="social" alt="Instagram">
					</a>
			</div>
		</div>
		<div id="copyright">
				<small> © Copyright 2020-2021 Luca Rastrelli. Tutti i diritti sono riservati</small>
			</div>
		</footer>
	</body>
</html>