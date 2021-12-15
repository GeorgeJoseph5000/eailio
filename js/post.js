function send_Post () {
	var vars = "";
	var album = document.getElementById("SelAlbums").value;
	var photo = document.getElementById("SelPhotoes").value;
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/send_post.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var fn = document.getElementById("post").value;
	if ($("#album").is(":hidden")) {
		vars = "post="+fn+"&album=none";
	}else{
		vars = "post="+fn+"&album="+album;
	}
	if($("#photo").is(":hidden")){
		vars += "&photo=none";
	}else{
		vars += "&photo="+photo;		
	}
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("post_show").innerHTML = return_data;
			}

	}
	x.send(vars);
}
function show_al (id){
		$("#plus"+id).hide();
		$("#two"+id).show();
		$("#three"+id).show();
		$("#four"+id).show();
		$("#fivesixseveneight"+id).show();
		$("#nine"+id).show();
		$("#ten"+id).show();
		$("#minus"+id).show();
	
}
function hide_al (id){
		$("#plus"+id).show();
		$("#two"+id).hide();
		$("#three"+id).hide();
		$("#four"+id).hide();
		$("#fivesixseveneight"+id).hide();
		$("#nine"+id).hide();
		$("#ten"+id).hide();
		$("#minus"+id).hide();

}