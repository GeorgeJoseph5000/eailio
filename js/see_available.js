function see_available(id) {
    var x = new XMLHttpRequest();
    x.open( "POST", "scripts/see_avaliable_id.php", true );
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "id="+id;
    x.onreadystatechange = function (){
	if(x.readyState == 4 && x.status == 200){
	    var return_data = x.responseText;
	    document.getElementById("status"+id).innerHTML = return_data;
	}
    }
    x.send(vars);
    setTimeout("see_available("+id+");",100);
}