function delete_post(username) {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/remove_post.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "id="+username;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}