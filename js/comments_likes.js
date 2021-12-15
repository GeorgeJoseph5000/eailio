function send_comment () {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/send_comment.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var fn = document.getElementById("comment").value;
    var ln = document.getElementById("postid").innerHTML;
	var vars = "comment="+fn+"&postid="+ln;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("comments_show").innerHTML = return_data;
			}
	}
	x.send(vars);
}
function send_like(post_id) {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/send_like.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var ln = post_id;
	var vars = "postid="+ln;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("like_show"+ln).innerHTML = return_data;
			}
	}
	x.send(vars);
	console.log(post_id);
}
function delete_like(post_id) {
	var x = new XMLHttpRequest();
	x.open( "POST", "scripts/delete_like.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var ln = post_id;
	var vars = "postid="+ln;
	x.onreadystatechange = function (){
			if(x.readyState == 4 && x.status == 200){
	    		var return_data = x.responseText;
				document.getElementById("like_show"+ln).innerHTML = return_data;
			}
	}
	x.send(vars);
	console.log(post_id);
}