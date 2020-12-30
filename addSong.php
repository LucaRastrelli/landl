<?php
	require_once __DIR__ . "/php/config.php";
	session_start();
	include DIR_UTIL . "sessionUtil.php";
	require_once DIR_UTIL . "songManagerDb.php";
	require_once DIR_UTIL . "dbManager.php";

	global $landlDb;

	$artist = $_POST['artist_name'];
	$name = $_POST['song_name'];
	$album = $_POST['album_name'];
	$lyrics = $_POST['lyrics'];
	$song = $_FILES['song_file'];
	$difficolta = $_POST['difficolta'];

	$artistArray = explode(" ", $artist);
	$nameArray = explode(" ", $name);
	$albumArray = explode(" ", $album);

	$artistString = implode("", $artistArray);
	$nameString = implode("", $nameArray);
	$albumString = implode("", $albumArray);

	if(checkAlbum($album) == false) {
		$albumPng = $_FILES['album_picture'];
		$ext = strtolower(pathinfo($albumPng['name'], PATHINFO_EXTENSION));
			if ($ext !== 'png') {
    			$errorMessage = 'File album non supportato';
				header('location: ./admin.php?errorMessage=' . $errorMessage);
				exit;
    		}
    	$newAlbumName = $artistString . "_" . $albumString . ".png";
    	$albumDest = './img/album/';
		move_uploaded_file($albumPng['tmp_name'], $albumDest.$newAlbumName);
	}

	$ext = strtolower(pathinfo($song['name'], PATHINFO_EXTENSION));
	if ($ext !== 'mp3') {
    			$errorMessage = 'File canzone non supportato';
				header('location: ./admin.php?errorMessage=' . $errorMessage);
				exit;
    		}
    //MODIFY FILE PHP.INI PARAMETER upload_max_filesize
    if(!$song['error'] == UPLOAD_ERR_OK) {
    		$errorMessage = 'File canzone errore' . $song['error'];
				header('location: ./admin.php?errorMessage=' . $errorMessage);
				exit;
	}
	$artist = $landlDb->sqlInjectionFilter($artist);
	$name = $landlDb->sqlInjectionFilter($name);
	$album = $landlDb->sqlInjectionFilter($album);
	$lyrics = $landlDb->sqlInjectionFilter($lyrics);
	$difficolta = $landlDb->sqlInjectionFilter($difficolta);

	$resultMessage = 'Canzone aggiunta correttamente';
	$result = $landlDb->insertSong($artist, $name, $lyrics, $album, $difficolta);

	if ($result > 0) {
			header('location: ./admin.php?successMessage=' . $resultMessage);
			$newSongName = $artistString . "-" . $nameString . ".mp3";
   			$songDest = './songs/';
			move_uploaded_file($song['tmp_name'], $songDest.$newSongName);
			return;	
	}		
	else {
		$errorMessage = "Operazione fallita: Canzone già inserita";
		header('location: ./admin.php?errorMessage=' . $errorMessage);
		return;
		}

	function checkAlbum($album) {			//se l'album già esiste ritorno true, altrimenti false
		$result = loadAlbums();
		while($row = $result->fetch_assoc()) {
			if($album == $row['album'])
				return true;
		}
		return false;
	}

?>