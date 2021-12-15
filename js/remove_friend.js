function delete_friend () {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/remove_friend.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var un = document.getElementById("username").innerHTML;
	var un2 = document.getElementById("un").innerHTML;
	var vars = "username="+un+"&un="+un2;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function delete_friend_pram (username) {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/remove_friend.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var un2 = document.getElementById("un").innerHTML;
	var vars = "username="+username+"&un="+un2;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function send_message(username) {
	window.location = "send_msg.php?u="+username;
}
function delete_user(username) {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/remove_user.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var un2 = document.getElementById("un").innerHTML;
	var vars = "username="+username+"&un="+un2;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}