
<?php
include("./inc/connect.inc.php");
$un=$_GET['un'];
	$row=mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$un'"));
	if($row['activated']==''){
		header("Location: index.php");
	}else{
		header("Location: login.php?message=active");
	}
	?>