<?php
	session_start();

	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "userManagerDb.php";
	require_once DIR_AJAX_UTIL . "AjaxResponse.php";
	require_once DIR_UTIL . "songManagerDb.php";
	require_once DIR_UTIL . "sessionUtil.php";

	$response = new AjaxResponse();

	if (!isset($_GET['utente']) && !isset($_GET['update'])){
		echo json_encode($response);
		return;
	}

	$user = $_SESSION['username'];

	if(isset($_GET['utente'])) {
		$friend = $_GET['utente'];
		$result = addRemoveFriend($user, $friend);
		$message = "OK";
		$response = setUserResponse($result, $message, $friend);
	}
	else {
		$update = $_GET['update'];
		$result = updateStats($user, $update);
		$message = "OK";
		$response = taskCompleted($message);
	}

	echo json_encode($response);
	return;


	function setUserResponse($result, $message, $friend) {
		$response = new AjaxResponse("0", $message);

		$utente = new Utente();

		$utente->username = $friend;
		$utente->follow = $result;

		$response->data = $utente;

		return $response;
	}

	function taskCompleted($message) {
		$response = new AjaxResponse("0", $message);

		return $response;
	}


?>