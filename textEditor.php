<title>Text Editor</title>
<?php
include("./inc/header.inc.php");
	if(isset($_SESSION['user_login'])){
		$check2 = mysql_query("SELECT activated FROM users WHERE username='$un'");
		$ac_row = mysql_fetch_assoc($check2);
		if(!$ac_row['activated'] == 1){
			echo '<p class="error">This account is not activated.</p>';
			include_once 'inc/footer.inc.php';
			exit();
		}
		
	}else{
		echo '<p class="error">You should login in</p>';
		include ("./inc/footer.inc.php");
		exit();
	}
	include 'inc/vars.inc.php';
	$editor = true;
	include 'inc/aside.inc.php';
?>

<form method="post"  enctype="multipart/form-data" >
	<input type="file" name="editor_upload" />
    <input type="submit" name="upload" />
</form>
<script type="text/javascript">
	function saveFile(e){
		var s = document.getElementById("editarea").innerHTML;
		if(s == ""){
			alert("Enter a thing");	
		}
	}
</script>
<textarea id="editarea" style="margin: 0px; width: 664px; height: 574px;"></textarea>
<input type="submit" onclick="saveFile()" />
<?php include 'inc/footer.inc.php';  ?>