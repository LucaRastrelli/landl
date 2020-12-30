<?php
	require_once __DIR__ . "/php/config.php";
	session_start();
	include DIR_UTIL . "sessionUtil.php";
	require_once DIR_UTIL . "songManagerDb.php";
	require_once DIR_UTIL . "dbManager.php";

	global $landlDb;

	$artist = $_POST['artist_name'];
	if(!isset($_POST['song_name'])) {
		header('location: ./admin.php?errorMessage=Seleziona una canzone');
		return;
	}
	$name = $_POST['song_name'];

	$artistArray = explode(" ", $artist);
	$nameArray = explode(" ", $name);

	$artistString = implode("", $artistArray);
	$nameString = implode("", $nameArray);

	$songPath = './songs/' . $artistString . '-' . $nameString . '.mp3';

	if(unlink($songPath)) {
			$album = otherSongsAlbum($artist, $name);
			$albumArray = explode(" ", $album);
			$albumString = implode("", $albumArray);

			if($albumString != null) {
				if(removeAlbum($artistString, $albumString) == 0) {
					header('location: ./admin.php?errorMessage=Impossibile rimuovere l\'admin');
					return;
				}
			}
			$landlDb->removeSong($artist, $name);
			header('location: ./admin.php?successMessage=Canzone rimossa con successo');
			return;
		}
	else {
		header('location: ./admin.php?errorMessage=Impossibile rimuovere la canzone');
		return;
	}

	function otherSongsAlbum($artist, $name) {
		$result = loadAlbumByNameAndArtist($artist, $name);
		$row = $result->fetch_assoc();

		if(mysqli_num_rows($result) == 1) 
			return $row['album'];
		else return null;
		}

	function removeAlbum($artist, $album) {
		$albumPath = './img/album/' . $artist . '_' . $album . '.png';
		if(unlink($albumPath))
			return 1;
		else return 0;
	}
?>