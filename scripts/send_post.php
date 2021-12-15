<?php
    session_start();
	include('../inc/connect.inc.php');
	if (isset($_SESSION['user_login'])) {
		$un = $_SESSION['user_login'];
	}else{
		$un = "";
	}
	$album = $_POST['album'];
	$photo = $_POST['photo'];
	$post = $_POST['post'];
	if($post != ""){
		$date_added = date("Y-m-d");
		$added_by_2 = $_SESSION['user_login'];
		if($album == "none" && $photo  == "none"){
			$query = mysql_query("INSERT INTO posts VALUES('','$post','$date_added','$added_by_2','0','none','none')") or die(mysql_errno());
		}else if($album != "none" && $photo  == "none"){
			$query = mysql_query("INSERT INTO posts VALUES('','$post','$date_added','$added_by_2','0','$album','none')") or die(mysql_errno());
		}else if($album == "none" && $photo  != "none"){
			$query = mysql_query("INSERT INTO posts VALUES('','$post','$date_added','$added_by_2','0','none','$photo')") or die(mysql_errno());
		}
		include '../inc/posts.inc.php';
	}else{
		include '../inc/posts.inc.php';
	}
?>