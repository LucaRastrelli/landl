function SongDashboard(){}

SongDashboard.showSongs = 
	function(data, search) {
		songDashboardElement = document.getElementById("songDashboard");
		SongDashboard.removeContent();
	
		var newSongTableElem = SongDashboard.createSongTableElement();

		for(var i = 0; i < data.length; i++){
			var songItemElem = SongDashboard.createSongItemElement(data[i]);
			newSongTableElem.appendChild(songItemElem);
		}

		songDashboardElement.appendChild(newSongTableElem);

		if(search == false) {
			exploreNav = document.createElement("nav");
			exploreUI = document.createElement("ul");
			exploreBack = document.createElement("li");
			exploreForward = document.createElement("li");

			exploreUI.setAttribute("class", "explore_ui");
			exploreBack.setAttribute("class", "explore_button");
			exploreForward.setAttribute("class", "explore_button");

			exploreUI.appendChild(exploreBack);
			exploreUI.appendChild(exploreForward);
			exploreNav.appendChild(exploreUI);

			var offset = parseInt(window.location.href.split("offset=")[1]); 
			var offsetPlus = offset+1;

			var nameFilterWrong = window.location.href.split("name_filter=")[1];
			var nameFilter = nameFilterWrong.split("&");
			var order = window.location.href.split("order=")[1];

			console.log(nameFilter[0]);
			console.log(order);

			backAttribute = document.createElement("a");
			backAttribute.setAttribute("class", "left_arrow");

			forwardAttribute = document.createElement("a");
			forwardAttribute.setAttribute("class", "right_arrow");


			backAttribute.setAttribute("href", "./allenamento.php?offset=" + (offset-1) + "&name_filter=" + nameFilter[0] + "&order=" + order);

			forwardAttribute.setAttribute("href", "./allenamento.php?offset=" + offsetPlus + "&name_filter=" + nameFilter[0] + "&order=" + order);

			if(offset != 0)
				exploreBack.appendChild(backAttribute);

			if(data.length == 5)
				exploreForward.appendChild(forwardAttribute);

			songDashboardElement.appendChild(exploreNav);
		}
	}

SongDashboard.removeContent = 
	function(){
		var dashboardElement = document.getElementById("songDashboard");
		if(dashboardElement === null)
			return;

		 while (dashboardElement.firstChild) {
   			dashboardElement.removeChild(dashboardElement.lastChild);
  		}
		
	}

SongDashboard.removeInfo = 
	function() {
		var training = document.getElementById("training");
		if(training === null)
			return;

		while(training.firstChild) {
			training.removeChild(training.lastChild);
		}
	}

SongDashboard.createSongTableElement = 
	function() {
		var songTableElem = document.createElement("table");
		songTableElem.setAttribute("id", "songTable");
		songTableElem.setAttribute("class", "song_table");

		var tableTr = document.createElement("tr");

		var artistElem = document.createElement("th");
		artistElem.textContent = "Artista";

		var songElem = document.createElement("th");
		songElem.textContent = "Canzone";

		var playElem = document.createElement("th");
		playElem.textContent = "Ascolta";

		var selectElem = document.createElement("th");
		selectElem.textContent = "Seleziona canzone";

		var difficoltaElem = document.createElement("th");
		difficoltaElem.textContent = "Difficoltà";

		tableTr.appendChild(artistElem);
		tableTr.appendChild(songElem);
		tableTr.appendChild(playElem);
		tableTr.appendChild(selectElem);
		tableTr.appendChild(difficoltaElem);

		songTableElem.appendChild(tableTr);

		return songTableElem;
	}

SongDashboard.createSongItemElement = 
	function(currentData) {
		var artistaArray = currentData.artista.split(" ");
		var artistaString = "";

		for(var i = 0; i<artistaArray.length; i++)
			artistaString += artistaArray[i];

		var nomeArray = currentData.nome.split(" ");
		var nomeString = "";

		for(var i = 0; i<nomeArray.length; i++)
			nomeString += nomeArray[i];

		var albumArray = currentData.album.split(" ");
		var albumString = "";

		for(var i = 0; i<albumArray.length; i++)
			albumString += albumArray[i];

		var songItemTr = document.createElement("tr");
		songItemTr.setAttribute("id", "artist_" + artistaString + "_song_" + nomeString);

		var artistTd = document.createElement("td");
		artistTd.textContent = currentData.artista;

		var nameTd = document.createElement("td");
		nameTd.textContent = currentData.nome;

		var playTd = document.createElement("td");
		var audioControls = document.createElement("audio");

		var audioSource = document.createElement("source");
		audioSource.setAttribute("src", "./songs/" + artistaString + "-" + nomeString + ".mp3");
		audioSource.setAttribute("type", "audio/mpeg");

		audioControls.appendChild(audioSource);
		audioControls.setAttribute("controls", "controls");
		playTd.appendChild(audioControls);

		selectTd = document.createElement("td");
		selectTd.setAttribute("id", "selectItem_" + artistaString + "-" + nomeString);
		selectTd.setAttribute("class", "user_item select_item_");
		
		imgEasy = document.createElement("img");
		imgEasy.setAttribute("src", "./css/img/easy.png");
		imgEasy.setAttribute("class", "user_item select_item_");
		imgEasy.setAttribute("alt", "Easy");
		imgEasy.setAttribute("onClick", "SongDashboard.exercise(\"" + currentData.artista + "\",\"" + currentData.album + "\",\"" + currentData.nome + "\",\"" + currentData.testo +"\", 'facile')");
		selectTd.appendChild(imgEasy);

		imgHard = document.createElement("img");
		imgHard.setAttribute("src", "./css/img/hard.png");
		imgHard.setAttribute("class", "user_item select_item_");
		imgHard.setAttribute("alt", "Hard");
		imgHard.setAttribute("onClick", "SongDashboard.exercise(\"" + currentData.artista + "\",\"" + currentData.album + "\",\"" + currentData.nome + "\",\"" + currentData.testo +"\", 'difficile')");
		selectTd.appendChild(imgHard);

		var difficoltaTd = document.createElement("td");
		difficoltaTd.textContent = currentData.difficolta + "/5";

		songItemTr.appendChild(artistTd);
		songItemTr.appendChild(nameTd);
		songItemTr.appendChild(playTd);
		songItemTr.appendChild(selectTd);
		songItemTr.appendChild(difficoltaTd);

		return songItemTr;
	}

SongDashboard.setEmptyDashboard = 
	function() {

		SongDashboard.removeContent();
		var warningDivElem = document.createElement("div");
		warningDivElem.setAttribute("class", "warning");
		var warningSpanElem = document.createElement("span");
		warningSpanElem.textContent = "Non ci sono canzoni";

		warningDivElem.appendChild(warningSpanElem);

		var dashboardElement = document.getElementById("songDashboard");
		dashboardElement.appendChild(warningDivElem);
	}

SongDashboard.exercise = 
	function(artista, album, nome, testo, difficolta) {
		var artistaArray = artista.split(" ");
		var artistaString = "";

		for(var i = 0; i<artistaArray.length; i++)
			artistaString += artistaArray[i];

		var nomeArray = nome.split(" ");
		var nomeString = "";

		for(var i = 0; i<nomeArray.length; i++)
			nomeString += nomeArray[i];

		var albumArray = album.split(" ");
		var albumString = "";

		for(var i = 0; i<albumArray.length; i++)
			albumString += albumArray[i];

		SongDashboard.removeContent();
		SongDashboard.removeInfo();
		var searchElement = document.getElementById("search_song");
		searchElement.remove();

		var songDashboardElement = document.getElementById("songDashboard");
		
		var detailSong = document.createElement("div");
		detailSong.setAttribute("id", "detailed_song_tab");

		var albumBackground = document.createElement("div");

		albumBackground.setAttribute("id", "albumBackground");
		albumBackground.setAttribute("class", "album_background");
		albumBackground.style.backgroundImage = "url('./img/album/"+ artistaString + "_" + albumString + ".png')";

		var detailAlbum = document.createElement("div");
		detailAlbum.setAttribute("id", "detail_album");
		detailAlbum.setAttribute("class", "album_info");

		var albumPng = document.createElement("img");
		albumPng.setAttribute("src", "./img/album/"+ artistaString + "_" + albumString + ".png");
		albumPng.setAttribute("class", "album_img");
		albumPng.setAttribute("alt", "Cover");

		detailAlbum.appendChild(albumPng);
		albumBackground.appendChild(detailAlbum);

		var songHeader = document.createElement("div");
		songHeader.setAttribute("id", "song_header");
		songHeader.setAttribute("class", "song_exercise");

		var canzoneH1 = document.createElement("h1");
		canzoneH1.textContent = nome;

		var artistaH2 = document.createElement("h2");
		artistaH2.textContent = artista;

		var br = document.createElement("br");
		artistaH2.appendChild(br);

		var audioControls = document.createElement("audio");

		var audioSource = document.createElement("source");
		audioSource.setAttribute("src", "./songs/" + artistaString + "-" + nomeString + ".mp3");
		audioSource.setAttribute("type", "audio/mpeg");

		audioControls.appendChild(audioSource);
		audioControls.setAttribute("controls", "controls");
		artistaH2.appendChild(audioControls);

		songHeader.appendChild(canzoneH1);
		songHeader.appendChild(artistaH2);

		var songBody = document.createElement("div");
		songBody.setAttribute("id", "songBody");
		songBody.setAttribute("class", "song_body");
		var lyrics = document.createElement("p");
		lyrics.setAttribute("id", "lyrics");
		songBody.appendChild(lyrics);

		detailAlbum.appendChild(songHeader);
		songDashboardElement.appendChild(albumBackground);
		songDashboardElement.appendChild(songBody);
		if(difficolta == "difficile")
			SongDashboard.loadExerciseHard(testo);
		else
			SongDashboard.loadExerciseEasy(testo);
	}

SongDashboard.loadExerciseEasy = 
	function(testo) {

		var testoSplit = testo.split(" ");
		var random = Math.floor((Math.random() * (testoSplit.length -1 )));

		var workSpace = document.getElementById("lyrics");
		var form = document.createElement("form");
		form.setAttribute("id", "form_text");

		workSpace.appendChild(form);
		var beforeRandom = document.createElement("p");
		var postRandom = document.createElement("p");

		for(var i = 0; i<testoSplit.length; i++) {
			if(i == random) {
			var label = document.createElement("label");
		    label.setAttribute("for", "words");
		    var input = document.createElement("input");
		    input.setAttribute("type","text");
		    input.setAttribute("id", "words");
		    input.setAttribute("name", "words");
		    i++;
		    var bool = true;
		    continue;
		 }
		 	if(bool == true)
		 		postRandom.textContent += testoSplit[i] + " ";
			else
				beforeRandom.textContent += testoSplit[i] + " ";
		}
		form.appendChild(beforeRandom);
		form.appendChild(label);
		form.appendChild(input);
		form.appendChild(postRandom);

		var rightWords = testoSplit[random] + " " + testoSplit[random+1];

		var button = document.createElement("input");
		
		button.setAttribute("type", "button");
		button.setAttribute("id", "correct_button");
		button.setAttribute("onClick", "SongDashboard.correctExerciseEasy(\"" + rightWords + "\")");
		button.setAttribute("value", "Invia");
		
		form.appendChild(button);

		window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
		//https://stackoverflow.com/questions/5629805/disabling-enter-key-for-form
	}

SongDashboard.correctExerciseEasy = 
	function(rightWords) {
		var space = document.getElementById("words");
		var userWords = space.value;

		console.log(rightWords, userWords);

		if(userWords != rightWords){
			console.log("errato");
			var lyrics = document.getElementById("lyrics");
			var error = document.createElement("div");
			error.setAttribute("id", "error");
			error.setAttribute("class", "error_response");
			error.textContent = "Sbagliato! Le parole giuste erano: '" + rightWords + "'";
			lyrics.appendChild(error);
			UserEventHandler.updateStatsUser(0);
		}
		else {
			console.log("corretto");
			var lyrics = document.getElementById("lyrics");
			var noError = document.createElement("div");
			noError.setAttribute("id", "noError");
			noError.setAttribute("class", "error_response");
			noError.textContent = "Corretto!";
			lyrics.appendChild(noError);
			UserEventHandler.updateStatsUser(1);

		}

		var button = document.getElementById("correct_button");
		button.setAttribute("disabled", "disabled");

		var back = document.createElement("div");
		back.setAttribute("class", "back_link");
		attribute = document.createElement("a");
		attribute.setAttribute("href", "./allenamento.php?offset=0&name_filter=artista&order=asc");
	 	
		arrow = document.createElement("i");
		arrow.setAttribute("class","left_arrow");
		attribute.appendChild(arrow);

		backLink = document.createElement("p");
		backLink.textContent = "Torna indietro";
		attribute.appendChild(backLink);

		back.appendChild(attribute);
		lyrics.appendChild(back);

	}

SongDashboard.loadExerciseHard = 
	function(testo) {
		var testoSplit = testo.split(" ");
		var randomOne = Math.floor((Math.random() * (testoSplit.length -1 )));

		var randomTwo = Math.floor((Math.random() * (testoSplit.length -1 )));
		while(randomTwo == randomOne || randomTwo == randomOne - 1 || randomTwo == randomOne + 1)
			randomTwo = Math.floor((Math.random() * (testoSplit.length -1 )));

		if(randomOne > randomTwo) {
			var randomMax = randomOne;
			var randomMin = randomTwo;
		}
		else {
			var randomMax = randomTwo;
			var randomMin = randomOne;
		}

		var workSpace = document.getElementById("lyrics");
		var form = document.createElement("form");
		form.setAttribute("id", "form_text");

		workSpace.appendChild(form);
		var beforeRandomOne = document.createElement("p");
		var postRandomOne = document.createElement("p");
		var postRandomTwo = document.createElement("p");

		var z = 0;
		var label = document.createElement("label");
		label.setAttribute("for", "words");

		for(var i = 0; i<testoSplit.length; i++) {
			if(i == randomMin) {
			    var inputMin = document.createElement("input");
			    inputMin.setAttribute("type","text");
			    inputMin.setAttribute("id", "wordsMin");
			    inputMin.setAttribute("name", "words");
			    i++;
			    z++;
			    continue;
			}
			if(i == randomMax) {
			    var inputMax = document.createElement("input");
			    inputMax.setAttribute("type","text");
			    inputMax.setAttribute("id", "wordsMax");
			    inputMax.setAttribute("name", "words");
			    i++;
			    z++;
			    continue;
			}
			if(z == 0)
				beforeRandomOne.textContent += testoSplit[i] + " ";
			if(z == 1)
		 		postRandomOne.textContent += testoSplit[i] + " ";
		 	if(z == 2)
		 		postRandomTwo.textContent += testoSplit[i] + " ";
		}

		form.appendChild(beforeRandomOne);
		form.appendChild(label);
		form.appendChild(inputMin);
		form.appendChild(postRandomOne);
		form.appendChild(inputMax);
		form.appendChild(postRandomTwo);

		var rightWordsMin = testoSplit[randomMin] + " " + testoSplit[randomMin+1];
		var rightWordsMax = testoSplit[randomMax] + " " + testoSplit[randomMax+1];

		var button = document.createElement("input");
		
		button.setAttribute("type", "button");
		button.setAttribute("id", "correct_button");
		button.setAttribute("onClick", "SongDashboard.correctExerciseHard(\"" + rightWordsMin + "\", \"" + rightWordsMax + "\")");
		button.setAttribute("value", "Invia");
		
		form.appendChild(button);

		window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
		//https://stackoverflow.com/questions/5629805/disabling-enter-key-for-form
	}
	
SongDashboard.correctExerciseHard = 
	function(rightWordsMin, rightWordsMax) {
		var spaceMin = document.getElementById("wordsMin");
		var userWordsMin = spaceMin.value;

		if(userWordsMin != rightWordsMin){
			var lyrics = document.getElementById("lyrics");
			var error = document.createElement("div");
			error.setAttribute("id", "errorMin");
			error.setAttribute("class", "error_response");
			error.textContent = "Sbagliato! Le parole giuste sono: '" + rightWordsMin + "'";
			lyrics.appendChild(error);
			UserEventHandler.updateStatsUser(0);
		}
		else {
			var lyrics = document.getElementById("lyrics");
			var noError = document.createElement("div");
			noError.setAttribute("id", "noErrorMin");
			noError.setAttribute("class", "error_response");
			noError.textContent = "Corretto!";
			lyrics.appendChild(noError);
			UserEventHandler.updateStatsUser(1);
		}
		var spaceMax = document.getElementById("wordsMax");
		var userWordsMax = spaceMax.value;

		if(userWordsMax != rightWordsMax){
			var lyrics = document.getElementById("lyrics");
			var error = document.createElement("div");
			error.setAttribute("id", "errorMax");
			error.setAttribute("class", "error_response");
			error.textContent = "Sbagliato! Le parole giuste sono: '" + rightWordsMax + "'";
			lyrics.appendChild(error);
			UserEventHandler.updateStatsUser(0);
		}
		else {
			if(userWordsMin != rightWordsMin) {
				var lyrics = document.getElementById("lyrics");
				var noError = document.createElement("div");
				noError.setAttribute("id", "noErrorMax");
				noError.setAttribute("class", "error_response");
				noError.textContent = "Corretto!";
				lyrics.appendChild(noError);
			}
			UserEventHandler.updateStatsUser(1);
		}

		var button = document.getElementById("correct_button");
		button.setAttribute("disabled", "disabled");

		var back = document.createElement("div");
		back.setAttribute("class", "back_link");
		attribute = document.createElement("a");
		attribute.setAttribute("href", "./allenamento.php?offset=0&name_filter=artista&order=asc");
	 	
		arrow = document.createElement("i");
		arrow.setAttribute("class","left_arrow");
		attribute.appendChild(arrow);

		backLink = document.createElement("p");
		backLink.textContent = "Torna indietro";
		attribute.appendChild(backLink);

		back.appendChild(attribute);
		lyrics.appendChild(back);
		
	}

SongDashboard.updateExercise = 
	function() {
		return;
	}

SongDashboard.artistSong = 
	function(currentData) {
		var select = document.getElementById("song_name");
		while (select.firstChild)
   			select.removeChild(select.lastChild);

		for(var i = 0; i < currentData.length; i++) {
			var newOption = document.createElement("option");
			var nome = currentData[i].nome;

			newOption.textContent = nome;
			select.appendChild(newOption);
		}
		return;
	}