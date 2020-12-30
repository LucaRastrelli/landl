function UserLoader() {}

UserLoader.DEFAULT_METHOD = "GET";
UserLoader.URL_REQUEST = "./php/ajax/userLoader.php";

UserLoader.ASYNC_TYPE = true;

UserLoader.SUCCESS_RESPONSE = "0";

UserLoader.loadData = 
	function(){
		var url = UserLoader.URL_REQUEST;
		var responseFunction = UserLoader.onAjaxResponse;

		AjaxManager.performAjaxRequest(UserLoader.DEFAULT_METHOD, url, UserLoader.ASYNC_TYPE, null, responseFunction);
	}

UserLoader.onAjaxResponse = 
	function(response){
		if(response.responseCode === UserLoader.SUCCESS_RESPONSE) {
			UserDashboard.refreshData(response.data);
			return;
		}
		else {
			UserDashboard.setEmptyDashboard();
			return;
		}
	}

UserLoader.search = 
	function(searchUser) {
		if(searchUser === null || searchUser.length === 0) {
			UserDashboard.removeContent();
			UserLoader.loadData();
			return;
		}
		var queryString = "?searchUser=" + searchUser;
		var url = UserLoader.URL_REQUEST + queryString;
		var responseFunction = UserLoader.onExploreAjaxRequest;

		AjaxManager.performAjaxRequest(UserLoader.DEFAULT_METHOD, url, UserLoader.ASYNC_TYPE, null, responseFunction);
	}

UserLoader.onExploreAjaxRequest = 
	function(response) {
		if(response.responseCode === UserLoader.SUCCESS_RESPONSE) {
			UserDashboard.refreshData(response.data);
			return;
		}
		else {
			UserDashboard.setEmptyDashboard();
			return;
		}
	}