function UserDashboard(){}

UserDashboard.refreshData = 
	function(data){
		UserDashboard.removeContent();

		var newUserListElem = UserDashboard.createUserListElement();

		for(var i = 0; i < data.length; i++){
			var userItemElem = UserDashboard.createUserItemElement(data[i]);
			newUserListElem.appendChild(userItemElem);
		}

		document.getElementById("userDashboard").appendChild(newUserListElem);
	}

UserDashboard.removeContent = 
	function(){
		var dashboardElement = document.getElementById("userDashboard");
		if(dashboardElement === null)
			return;

		var firstChild = dashboardElement.firstChild;
		if(firstChild != null)
			dashboardElement.removeChild(firstChild);
	}

UserDashboard.createUserListElement = 
	function() {
		var userListElem = document.createElement("ul");
		userListElem.setAttribute("id", "userList");
		userListElem.setAttribute("class", "user_list");

		return userListElem;
	}

UserDashboard.createUserItemElement = 
	function(currentData) {
		var userItemLi = document.createElement("li");
		userItemLi.setAttribute("id", "username_" + currentData.username);
		userItemLi.setAttribute("class", "user_detail");

		userItemLi.appendChild(UserDashboard.createImageElement(currentData));
		userItemLi.appendChild(UserDashboard.createDetailUserElement(currentData));
		userItemLi.appendChild(UserDashboard.createNavBarElement(currentData));

		return userItemLi;
	}

UserDashboard.createDetailUserElement =
	function(currentData) {
		var detailUserDivElem = document.createElement("div");
		detailUserDivElem.setAttribute("class", "detail_user_item");

		//TROVARE UN TAG DECENTE PER AGGIUNGERE IL NOME DELL'UTENTE
		detailUserDivElem.textContent = currentData.username;

		return detailUserDivElem;
	}

UserDashboard.createImageElement = 
	function(currentData) {
		var imageDivElem = document.createElement("div");
		imageDivElem.setAttribute("class", "image_user_item");

		var imageElem = new Image();
		imageElem.alt = "user_img";
		imageElem.src = './css/img/user.png';

		imageDivElem.appendChild(imageElem);
		return imageDivElem;
	}

UserDashboard.createNavBarElement = 
	function(currentData) {
		var navBarElem = document.createElement("nav");
		navBarElem.setAttribute("id", "user_bar_" + currentData.username);

		var friendItemElem = document.createElement("div");
		friendItemElem.setAttribute("id", "friendItem_" + currentData.username);
		friendItemElem.setAttribute("class", "user_item friend_item_" + currentData.follow);
		friendItemElem.setAttribute("onClick", "UserEventHandler.manageFriendEvent('" + currentData.username + "')");

		var statsItemElem = document.createElement("div");
		statsItemElem.setAttribute("id", "statsItemElem_" + currentData.username);
		statsItemElem.setAttribute("class", "user_item stats_item_");
		statsItemElem.setAttribute("onClick", "window.location = 'statistiche.php?utente=" + currentData.username + "'");

		navBarElem.appendChild(friendItemElem);
		navBarElem.appendChild(statsItemElem);

		return navBarElem;
	}

UserDashboard.setEmptyDashboard = 
	function() {
		UserDashboard.removeContent();
		var warningDivElem = document.createElement("div");
		warningDivElem.setAttribute("class", "warning");
		var warningSpanElem = document.createElement("span");
		warningSpanElem.textContent = "Non ci sono utenti";

		warningDivElem.appendChild(warningSpanElem);

		var dashboardElement = document.getElementById("userDashboard");
		dashboardElement.appendChild(warningDivElem);
	}

UserDashboard.updateUserList = 
	function(currentData) {
		if(document.getElementById("user_bar_" + currentData.username) === null)
			return;

		var userItem;
		userItem = document.getElementById("friendItem_" + currentData.username);
		userItem.setAttribute("class" , "user_item friend_item_" + currentData.follow);

	}