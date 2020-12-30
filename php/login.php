<?php
	require_once __DIR__ ."/config.php";
	require_once DIR_UTIL . "dbManager.php";
	require_once DIR_UTIL . "sessionUtil.php";

	$username = $_POST['username_in'];
	$password = $_POST['password_in'];

	$errorMessage = login($username, $password);
	if($errorMessage === null)
		header('location: ./../main.php');
	else if($errorMessage === 'admin')
		header('location: ./../admin.php');
	else
		header('location: ./../index.php?errorMessage=' . $errorMessage);

	function login($username, $password) {
		if($username != null && $password != null) {
			$userId = authenticate($username, $password);
			if($userId >= 0) {
				session_start();
				setSession($username);
				if($username == 'admin')
					return 'admin';
				return null;
			}
		}
		else
			return 'Errore';

		return 'Nome utente e/o password non validi';
	}

	function authenticate($username, $password) {
		global $landlDb;
		$username = $landlDb->sqlInjectionFilter($username);
		$password = $landlDb->sqlInjectionFilter($password);

		$queryText = "SELECT * FROM utenti WHERE username='" . $username . "' AND password ='" . $password . "'";
		
		$result = $landlDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if($numRow != 1)
			return -1;

		$userRow = $result->fetch_assoc();
		$landlDb->closeConnection();
		return $userRow['username'];
	}
?>