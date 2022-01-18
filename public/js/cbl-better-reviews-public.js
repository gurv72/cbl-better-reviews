(function( ) {
	'use strict';

	var postId = document.getElementById('br-likes-postid');
	var button = document.getElementById("br-likes-likebutton");
	var likeText = document.getElementById("cbl-like-text");
	var likedText = document.getElementById("cbl-liked-text");
	var likeTotal = document.getElementById("br-likes-total");

	var likedArray;

	//localStorage.clear();

	if (localStorage.getItem('likedPosts')) {
  		likedArray = JSON.parse(localStorage.getItem('likedPosts'))
	} else {
  		likedArray = []
	}

	if (likedArray.indexOf(postId.value) !== -1) {
		button.style.display = 'none';
		likeText.style.display = 'none';
		likedText.style.display = 'block';
	} else {
		likeText.style.display = 'block';
		likedText.style.display = 'none';
	}

	// Click the button
	button.addEventListener("click",function(e){
		var task = button.getAttribute("data-task");
		var data = 'task='+task+'&post_id='+postId.value;

		var request = new XMLHttpRequest();
		request.open('POST', '/', true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

		// Send the data
		status = request.send(data);

		// Once the request is sent
		request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				if (task == 'like') {
					button.style.display = 'none';
					likeText.style.display = 'none';
					likedText.style.display = 'block';
					update_like_total();

					if (likedArray.indexOf(postId.value) == -1) {
						likedArray.push(postId.value);
 						localStorage.setItem('likedPosts', JSON.stringify(likedArray));
					}
				}
			}
		};

	},false);

	function update_like_total() {

		var postId = document.getElementById('br-likes-postid');
		var likeData = 'task=likedata&post_id='+postId.value;

		// This is to update the like div, will need to be changed
		var datarequest = new XMLHttpRequest();
		datarequest.open('POST', '/', true);
		datarequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

		// Send the data
		var datastatus = datarequest.send(likeData);
		datarequest.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			likeTotal.innerHTML = datarequest.response;
			console.log(datarequest.response);
		}};
	}

})();
