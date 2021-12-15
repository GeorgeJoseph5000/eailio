<?php
    session_start();
	include('../inc/connect.inc.php');

    if (isset($_SESSION['user_login'])) {
		$un = $_SESSION['user_login'];
	}else{
		$un = "";
	}

	$postid = $_POST['postid'];
	$date_added = date("Y-m-d");
	$added_by_2 = $_SESSION['user_login'];
    $iflikemade = mysql_fetch_assoc(mysql_query("SELECT * FROM likes WHERE post_id='$postid' AND user_like='$un'"));
    if($iflikemade['user_like'] == ''){
        $queryins = mysql_query("INSERT INTO likes VALUES('','".$postid."','$un')");
        $seePostId = mysql_fetch_assoc(mysql_query("SELECT * FROM posts WHERE id='$postid'"));
        $likes = $seePostId['likes'];
        $likes++;
        echo '
        <a href="#" onclick="javascript: delete_like('.$postid.')"><span class="glyphicon glyphicon-thumbs-down"></span> Unlike</a>
        <p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
        ';
        $queryupdate = mysql_query("UPDATE `posts` SET `likes` = '$likes' WHERE `posts`.`id` = '$postid'");
    }
?>