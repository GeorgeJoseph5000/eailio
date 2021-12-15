setTimeout("load_chat();",30000);
setTimeout("see_available();",30000);

function send_chat() {
    var fn = document.getElementById("name").value;
    var ln = document.getElementById("msg").value;
    if (fn == "" || ln == "") {
	alert("Enter all fields!");
    }else{
    var x = new XMLHttpRequest();
    x.open( "POST", "scripts/send_chat_messenger.php", true );
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var send = document.getElementById("user_send").innerHTML;
    var to = document.getElementById("user_to").innerHTML;
    var vars = "name="+fn+"&msg="+ln+"&send="+send+"&to="+to;
    x.onreadystatechange = function (){
	if(x.readyState == 4 && x.status == 200){
	    var return_data = x.responseText;
	    document.getElementById("results").innerHTML = return_data;
	}
    }
    x.send(vars);
    document.getElementById("msg").value = "";
    }
    setTimeout("see_available();",30000);
    setTimeout("load_chat();",30000);
}
function load_chat() {
    var x = new XMLHttpRequest();
    x.open( "POST", "scripts/load_chat_messenger.php", true );
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var send = document.getElementById("user_send").innerHTML;
    var to = document.getElementById("user_to").innerHTML;
    var vars = "send="+send+"&to="+to;
    x.onreadystatechange = function (){
	if(x.readyState == 4 && x.status == 200){
	    var return_data = x.responseText;
	    document.getElementById("results").innerHTML = return_data;
	}
    }
    x.send(vars);
    setTimeout("load_chat();",30000);
}
function see_available() {
    var x = new XMLHttpRequest();
    x.open( "POST", "scripts/see_avaliable_messenger.php", true );
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var to = document.getElementById("user_to").innerHTML;
    var vars = "to="+to;
    x.onreadystatechange = function (){
	if(x.readyState == 4 && x.status == 200){
	    var return_data = x.responseText;
	    document.getElementById("status").innerHTML = return_data;
	}
    }
    x.send(vars);
    setTimeout("see_available();",30000);
}