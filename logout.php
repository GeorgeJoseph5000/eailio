<?php
	include("inc/connect.inc.php");
	session_start();
	mysql_query("UPDATE users SET avalabile = 'false' WHERE username = '".$_SESSION['user_login']."'");
	session_destroy();
	echo'<script> window.location="index.php"; </script> ';
?>