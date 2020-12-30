<?php

	require_once __DIR__ . "/../config.php";
	require DIR_UTIL . "dbConfig.php";
	$landlDb = new LandLDbManager();

	class LandLDbManager {
		private $mysqli_conn = null;

		function LandLDbManager() {
			$this->openConnection();
		}

		function openConnection(){
			if(!$this->isOpened()){
				global $dbHostname;
				global $dbUsername;
				global $dbPassword;
				global $dbName;

				$this->mysqli_conn = new mysqli($dbHostname, $dbUsername, $dbPassword);
				if($this->mysqli_conn->connect_error)
					die('Connect Error (' . $this->mysqli_conn->connect_errno . ') ' . $this->mysqli_conn->connect_error);

				$this->mysqli_conn->select_db($dbName) or
					die('Can\'t use: ' . mysqli_error());
			}
		}

		function isOpened() {
		return ($this->mysqli_conn != null);
		}

		function performQuery($queryText) {
			if(!$this->isOpened())
				$this->openConnection();

			return $this->mysqli_conn->query($queryText);
		}

		function sqlInjectionFilter($parameter){
			if(!$this->isOpened())
				$this->openConnection();

			return $this->mysqli_conn->real_escape_string($parameter);
		}

		function closeConnection() {
			if($this->mysqli_conn !== null)
				$this->mysqli_conn->close();

			$this->mysqli_conn = null;
		}

		function insertUser($username, $password, $nome, $cognome, $email) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = "INSERT INTO utenti VALUES('".$username."','".$password."','".$nome."','".$cognome."','".$email."');";

			if($this->mysqli_conn->query($queryText)) {
				return $this->insertStats($username);
			}
			else
				return -1;
		}
		function insertStats($username) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = "INSERT INTO statistiche VALUES('".$username."',0,0,0, CURRENT_DATE());";
			if($this->mysqli_conn->query($queryText))
				return 1;
			else
				return -1;
		}
		
		function getStats($username) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = "SELECT * FROM statistiche WHERE username = '" .$username ."';";
			if($row = $this->mysqli_conn->query($queryText)){
				return ($result = $row->fetch_assoc());
			}
			else
				return -1;
		}

		function checkUser($username) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = "SELECT username FROM utenti WHERE username = '" .$username."';";
			$result = $this->mysqli_conn->query($queryText);
			if(mysqli_num_rows($result)==1)
				return 1;
			else
				return -1;
		}

		function insertSong($artista, $nome, $testo, $album, $difficolta) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = 'INSERT INTO canzoni VALUES("'.$artista.'","'.$nome.'","'.$testo.'","'.$album.'",' .$difficolta. ');';

			if($this->mysqli_conn->query($queryText))
				return 1;
			else
				return 0;
		}

		function removeSong($artista, $nome) {
			if(!$this->isOpened())
				$this->openConnection();

			$queryText = 'DELETE FROM canzoni '
							. 'WHERE artista = "' . $artista . '" '
							. 'AND nome = "' . $nome . '" ;';

			if($this->mysqli_conn->query($queryText))
				return 1;
			else
				return 0;
		}	
	}
?>