function SongLoader() {}

SongLoader.DEFAULT_METHOD = "GET";
SongLoader.URL_REQUEST = "./php/ajax/songLoader.php";

SongLoader.ASYNC_TYPE = true;

SongLoader.SUCCESS_RESPONSE = "0";

SongLoader.loadData = 
	function(offset, nameFilter, order){
		var queryString = '?offset=' + offset + "&name_filter=" + nameFilter + "&order=" + order;
		var url = SongLoader.URL_REQUEST + queryString;
		var responseFunction = SongLoader.onAjaxResponse;

		AjaxManager.performAjaxRequest(SongLoader.DEFAULT_METHOD, url, SongLoader.ASYNC_TYPE, null, responseFunction);
	}

SongLoader.onAjaxResponse = 
	function(response){
		if(response.responseCode === SongLoader.SUCCESS_RESPONSE) {
			SongDashboard.showSongs(response.data, false);
			return;
		}
		else {
			SongDashboard.setEmptyDashboard();
			return;
		}
	}

SongLoader.search = 
	function(searchSong, offset) {
		if(searchSong === null || searchSong.length === 0) {
			SongDashboard.removeContent();
			SongLoader.loadData(offset);
			return;
		}
		var queryString = "?searchSong=" + searchSong;
		var url = SongLoader.URL_REQUEST + queryString;
		var responseFunction = SongLoader.onExploreAjaxRequest;

		AjaxManager.performAjaxRequest(SongLoader.DEFAULT_METHOD, url, SongLoader.ASYNC_TYPE, null, responseFunction);
	}

SongLoader.onExploreAjaxRequest = 
	function(response) {
		if(response.responseCode === SongLoader.SUCCESS_RESPONSE) {
			SongDashboard.showSongs(response.data, true);
			return;
		}
		else {
			SongDashboard.setEmptyDashboard();
			return;
		}
	}

SongLoader.findSong = 
	function(songId) {
		var queryString = "?songId=" + songId;
		var url = SongLoader.URL_REQUEST + queryString;
		var responseFunction = SongLoader.onFindAjaxRequest;

		AjaxManager.performAjaxRequest(SongLoader.DEFAULT_METHOD, url, SongLoader.ASYNC_TYPE, null, responseFunction);
	}

SongLoader.onFindAjaxRequest = 
	function(response) {
		if(response.responseCode === SongLoader.SUCCESS_RESPONSE) {
			SongDashboard.artistSong(response.data);
			return;
		}
	}

SongLoader.enableSong = 
	function() {
		var artist = document.getElementById("artist_name");
		var value = artist.value;

		var song = document.getElementById("song_name");
		if(value== "Nome Artista") {
			song.disabled = true;
			option = song.firstChild;
			option.textContent = "Nome Canzone";
			return;
		}
		song.disabled = false;
		console.log(value);

		var row = SongLoader.findSong(value);

	}