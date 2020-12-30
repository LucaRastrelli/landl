function UserEventHandler() {}

UserEventHandler.DEFAULT_METHOD = "GET";
UserEventHandler.URL_REQUEST = "./php/ajax/userInteraction.php";
UserEventHandler.ASYNC_TYPE = true;

UserEventHandler.SUCCESS_RESPONSE = "0";

UserEventHandler.manageFriendEvent = 
	function(friendUsername) {
		var queryString ="?utente=" + friendUsername;
		var url = UserEventHandler.URL_REQUEST + queryString;
		var responseFunction = UserEventHandler.onAjaxResponse;

		AjaxManager.performAjaxRequest(UserEventHandler.DEFAULT_METHOD, url, UserEventHandler.ASYNC_TYPE, null, responseFunction);
	}

UserEventHandler.onAjaxResponse = 
	function(response) {
		if (response.responseCode === UserEventHandler.SUCCESS_RESPONSE)
			UserDashboard.updateUserList(response.data);
	}

UserEventHandler.updateStatsUser = 
	function(update) {
		var queryString ="?update=" + update;
		var url = UserEventHandler.URL_REQUEST + queryString;
		var responseFunction = UserEventHandler.onUpdateStatsAjaxResponse;

		AjaxManager.performAjaxRequest(UserEventHandler.DEFAULT_METHOD, url, UserEventHandler.ASYNC_TYPE, null, responseFunction);
	}

UserEventHandler.onUpdateStatsAjaxResponse = 
	function(response) {
		if (response.responseCode === UserEventHandler.SUCCESS_RESPONSE)
			SongDashboard.updateExercise();
	}