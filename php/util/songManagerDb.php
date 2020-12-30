<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "dbManager.php";

	function loadAllSongs($offset, $nToLoad, $nameFilter, $order) {
		global $landlDb;
		$offset = $landlDb->sqlInjectionFilter($offset);
		$queryText = 'SELECT * '
						. 'FROM canzoni '
						. 'ORDER BY '. $nameFilter .' ' . $order. ' '
						. 'LIMIT ' . $offset . ',' . $nToLoad . ';';

		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function exploreSong($searchSong) {
		global $landlDb;
		$queryText = 'SELECT C.* '
						.'FROM ( '
							.'SELECT D.artistanome AS fullname '
							.'FROM (SELECT CONCAT(artista, " ", nome) as artistanome, CONCAT(nome, " ", artista) as nomeartista '
								.'FROM canzoni) AS D '
							.'WHERE D.artistanome LIKE \'' . $searchSong . '%\' '
							.'OR D.nomeartista LIKE \'' . $searchSong . '%\' '
						.') AS DD INNER JOIN Canzoni C ON DD.fullname LIKE (CONCAT("%", C.artista, "%")) '
						.'WHERE DD.fullname LIKE (CONCAT("%", C.nome, "%"));';

		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function loadAlbums() {
		global $landlDb;
		$queryText = 'SELECT DISTINCT album '
						.'FROM canzoni '
						.'ORDER BY album ASC;';
						
		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function loadArtists() {
		global $landlDb;
		$queryText = 'SELECT DISTINCT artista '
						.'FROM canzoni '
						.'ORDER BY artista ASC;';
						
		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function loadSongByArtist($artista) {
		global $landlDb;
		$queryText = 'SELECT * '
						.'FROM canzoni '
						.'WHERE artista LIKE \'' . $artista . '%\' '
						.'ORDER BY nome ASC;';
						
		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}

	function loadAlbumByNameAndArtist($artista, $nome) {
		global $landlDb;
		$queryText = 'SELECT * '
						.'FROM canzoni '
						.'WHERE album = ('
							.'SELECT album '
							.'FROM canzoni '
							.'WHERE artista LIKE \'' . $artista . '%\' '
							.'AND nome LIKE \'' . $nome . '%\' '
						.') AND artista LIKE \'' . $artista . '%\' ';

		$result = $landlDb->performQuery($queryText);
		$landlDb->closeConnection();
		return $result;
	}
?>