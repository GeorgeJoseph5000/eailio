function delete_album(id) {
	var x = new XMLHttpRequest();
	x.open("POST", "scripts/delete_album.php", true);
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var vars = "id=" + id;
	x.onreadystatechange = function() {
		if (x.readyState == 4 && x.status == 200) {
			var return_data = x.responseText;
			document.getElementById("albums").innerHTML = return_data;
		}

	}
	x.send(vars);
}