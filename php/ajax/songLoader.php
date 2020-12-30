<?php
	session_start();

	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "songManagerDb.php";
	require_once DIR_AJAX_UTIL . "AjaxResponse.php";

	$response = new AjaxResponse();

	if(isset($_GET['songId']))
		$result = loadSongByArtist($_GET['songId']);
	else if(!isset($_GET['searchSong']))
			$result = loadAllSongs(($_GET['offset'])*5, 5,($_GET['name_filter']),($_GET['order']));
	else
		$result = exploreSong($_GET['searchSong']);
	
	if(checkEmptyResult($result)){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}
	
	$message = "OK";
	$response = setSongResponse($result, $message);
	echo json_encode($response);
	return;


	function checkEmptyResult($result) {
		if($result === null or !$result)
			return true;

		return($result->num_rows <= 0);
	}

	function setEmptyResponse() {
		$message = "Non ci sono canzoni da caricare!";
		return new AjaxResponse("-1", $message);
	}

	function setSongResponse($result, $message) {
		$response = new AjaxResponse("0", $message);

		$index = 0;
		while($row = $result->fetch_assoc()) {
			$canzone = new Canzone();

			$canzone->artista = $row['artista'];
			$canzone->nome = $row['nome'];
			$canzone->testo = $row['testo'];
			$canzone->album = $row['album'];
			$canzone->difficolta = $row['difficolta'];

			$response->data[$index] = $canzone;
			$index++;
		}
		return $response;
	}

?>