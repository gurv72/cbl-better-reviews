(function( ) {
	'use strict';

	var postid = document.getElementById('br-likes-postid');
	var button = document.getElementById("br-likes-likebutton");
	var liketotal = document.getElementById("br-likes-total");

	// Click the button
	button.addEventListener("click",function(e){
		var task = button.getAttribute("data-task");
		var data = 'task='+task+'&post_id='+postid.value;

		var request = new XMLHttpRequest();
		request.open('POST', '/', true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

		// Send the data
		status = request.send(data);

		// Once the request is sent
		request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log('succeed');

			if (task == 'like') {
				button.innerHTML = 'Unlike';
				liketotal.innerHTML = 'Unliked';
				button.setAttribute('data-task', 'unlike');
			} else {
				button.innerHTML = 'Like';
				liketotal.innerHTML = 'Liked';
				button.setAttribute('data-task', 'like');
			}

        }};

	},false);

})();
