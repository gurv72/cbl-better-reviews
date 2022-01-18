(function( ) {
	'use strict';

	var postId = document.getElementById('br-likes-postid');
	var button = document.getElementById("br-likes-likebutton");
	var likeTotal = document.getElementById("br-likes-total");

	var likedArray;

	//localStorage.clear();

	if (localStorage.getItem('likedPosts')) {
  		likedArray = JSON.parse(localStorage.getItem('likedPosts'))
	} else {
  		likedArray = []
	}

	if (likedArray.indexOf(postId.value) !== -1) {
		button.innerHTML = 'Unlike';
		button.disabled = true;
	}

	console.log(likedArray);

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
					button.innerHTML = 'Unlike';
					update_like_total();
					button.setAttribute('data-task', 'unlike');

					if (likedArray.indexOf(postId.value) == -1) {
						likedArray.push(postId.value);
 						localStorage.setItem('likedPosts', JSON.stringify(likedArray));
					}
				} /* else {
					button.innerHTML = 'Like';
					update_like_total();
					button.setAttribute('data-task', 'like');
				} */
			}};

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
