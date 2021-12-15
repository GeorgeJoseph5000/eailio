function send_Message () {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/send_msg_script.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var fn = document.getElementById("msg_body").value;
	var un = document.getElementById("username").innerHTML;
	var un2 = document.getElementById("un").innerHTML;
	var subject = document.getElementById("subject").value;
	var album = document.getElementById("Albums").value;
	var photo = document.getElementById("Photoes").value;
	var vars;
	if ($("#album").is(":hidden")) {
		vars = "body="+fn+"&username="+un+"&un="+un2+"&subject="+subject+"&album=none";
	}else{
		vars = "body="+fn+"&username="+un+"&un="+un2+"&subject="+subject+"&album="+album;
	}
	if($("#photo").is(":hidden")){
		vars += "&photo=none";
	}else{
		vars += "&photo="+photo;		
	}
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("message_results").innerHTML = return_data;
			}

	}
	x.send(vars);
}
