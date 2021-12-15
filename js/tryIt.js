setTimeout("show_html()",100);
function show_html() {
    var x = new XMLHttpRequest();
	x.open( "POST", "scripts/show_html.php", true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var fn = document.getElementById("ed").value;
	var vars = "ed="+fn;
	x.onreadystatechange = function (){
	    if(x.readyState == 4 && x.status == 200){
	    	var return_data = x.responseText;
		document.getElementById("show").innerHTML = return_data;
	    }
	}
	x.send(vars);
    setTimeout("show_html()",100);
}