function make_admin(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_admin.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}

function make_mod(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_mod.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function make_nor(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_nor.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("unfriend_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function make_admin_other(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_admin_other.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("pos_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}

function make_mod_other(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_mod_other.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("pos_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function make_nor_other(user){
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/make_nor_other.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "user="+user;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("pos_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}