function addfriend() {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/add_friend.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var un = document.getElementById("username").innerHTML;
	var un2 = document.getElementById("un").innerHTML;
	var vars = "username="+un+"&un="+un2;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("addfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}