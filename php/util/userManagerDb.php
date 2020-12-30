<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "dbManager.php";

	function loadAllUser() {
		global $landlDb;
		$username = $_SESSION["username"];
		$queryText = 'SELECT F.friend as username, 1 as amico '
						. 'FROM Follow F '
						. 'WHERE F.username = \'' . $username . '\' '
						. 'UNION '
					. 'SELECT U.username as username, 0 as amico '
						. 'FROM Utenti U LEFT OUTER JOIN ('
							. 'SELECT * '
							. 'FROM Follow '
							. 'WHERE username = \'' . $username . '\' '
							. ') AS F2 '
						. 'ON (U.username = F2.friend) '
						. 'WHERE U.username != \'admin\' '
						. 'AND F2.username IS NULL '
						. 'AND U.username != \'' . $username . '\' ;';

		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function exploreUser($searchUser) {
		global $landlDb;
		$username = $_SESSION["username"];
		$queryText = 'SELECT F.friend as username, 1 as amico '
						. 'FROM Follow F '
						. 'WHERE F.username = \'' . $username . '\' '
						. 'AND F.friend LIKE \'' . $searchUser . '%\' '
						. 'UNION '
					. 'SELECT U.username as username, 0 as amico '
						. 'FROM Utenti U LEFT OUTER JOIN ('
							. 'SELECT * '
							. 'FROM Follow '
							. 'WHERE username = \'' . $username . '\' '
							. ') AS F2 '
						. 'ON (U.username = F2.friend) '
						. 'WHERE U.username != \'admin\' '
						. 'AND F2.username IS NULL '
						. 'AND U.username LIKE \'' . $searchUser . '%\' '
						. 'AND U.username != \'' . $username . '\' ;';

		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function addRemoveFriend($username, $friend) {
		global $landlDb;
		$queryText = 'SELECT * FROM follow WHERE username = \'' . $username . '\' AND friend = \'' . $friend . '\' ';
		$preResult = $landlDb->performQuery($queryText);

		$numRows = $preResult->num_rows;

		if($numRows === 1) {
			$queryText = 'DELETE FROM follow WHERE username = \'' . $username . '\' AND friend = \'' . $friend . '\' ';
			$result = $landlDb->performQuery($queryText);
			$landlDb->closeConnection();
			return 0;
		}

		else {
			$queryText = 'INSERT INTO follow VALUES ( \'' . $username . '\' , \'' . $friend . '\' )';		
			$result = $landlDb->performQuery($queryText);
			$landlDb->closeConnection();
			return 1;
		}
	}

	function updateStats($username, $update) {
		global $landlDb;
		if($update == 1) {		//risposta corretta
			$queryText = 'UPDATE statistiche '
							.'SET allenamenti = allenamenti + 1, corrette = corrette + 1 '
							.'WHERE username = \'' . $username . '\' ';
		}
		else {					//risposta errata
			$queryText = 'UPDATE statistiche '
							.'SET allenamenti = allenamenti + 1, errate = errate + 1 '
							.'WHERE username = \'' . $username . '\' ';
		}
		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return;
	}
?>