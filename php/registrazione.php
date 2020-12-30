<?php
	require_once __DIR__ . "/config.php";
	require_once DIR_UTIL . "dbManager.php";
	require_once DIR_UTIL . "dbConfig.php";
	require_once __DIR__ . "/login.php";


	$username = $_POST['username'];
	$password = $_POST['password'];
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$email = $_POST['email'];
	$confpwd = $_POST['Conf_passwd'];

	global $landlDb;


	$username = $landlDb->sqlInjectionFilter($username);
	$nome = $landlDb->sqlInjectionFilter($nome);
	$cognome = $landlDb->sqlInjectionFilter($cognome);
	$email = $landlDb->sqlInjectionFilter($email);
	$password = $landlDb->sqlInjectionFilter($password);
	$confpwd = $landlDb->sqlInjectionFilter($confpwd);

	if($password != $confpwd) {
		header('location: ./../signup.php?errorMessage=Password di conferma diversa');
		return;
	}

	$result = $landlDb->insertUser($username, $password, $nome, $cognome, $email);

	if($result == 1) {
		login($username, $password);
		header('location: ./../main.php?registrazioneCompletata');
		return;
	}
	else if($result == -1) {
		$messageResult = 'Nome utente già esistente o e-mail già utilizzata';
		header('location: ./../signup.php?errorMessage=' . $messageResult);
		return;
	}
?>