<?php
	session_start();

	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "userManagerDb.php";
	require_once DIR_AJAX_UTIL . "AjaxResponse.php";

	$response = new AjaxResponse();

	if(!isset($_GET['searchUser']))
		$result = loadAllUser();
	else
		$result = exploreUser($_GET['searchUser']);
	
	if(checkEmptyResult($result)){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}
	
	$message = "OK";
	$response = setResponse($result, $message);
	echo json_encode($response);
	return;


	function checkEmptyResult($result) {
		if($result === null or !$result)
			return true;

		return($result->num_rows <= 0);
	}

	function setEmptyResponse() {
		$message = "Non ci sono utenti da caricare!";
		return new AjaxResponse("-1", $message);
	}

	function setResponse($result, $message) {
		$response = new AjaxResponse("0", $message);

		$index = 0;
		while($row = $result->fetch_assoc()) {
			$utente = new Utente();

			$utente->username = $row['username'];
			$utente->follow = $row['amico'];

			$response->data[$index] = $utente;
			$index++;
		}
		return $response;
	}

?>