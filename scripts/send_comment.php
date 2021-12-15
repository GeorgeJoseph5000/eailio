<?php
    session_start();
	include('../inc/connect.inc.php');

	$comment = $_POST['comment'];
	$postid = $_POST['postid'];
	if($comment != ""  || $postid == 0){
		$date_added = date("Y-m-d");
		$added_by_2 = $_SESSION['user_login'];
		$queryins = mysql_query("INSERT INTO comments VALUES('','".$postid."','$added_by_2','$comment','$date_added')");
		$query = mysql_query("SELECT * FROM comments WHERE post_id='".$postid."'");
        while($row = mysql_fetch_array($query)){
            $id = $row['id'];
            $body = $row['comment_body'];
            $date_added = $row['date'];
            $added_by = $row['comment_user'];
            $row_pic1 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$added_by' "));
            echo '<a href="otherprofile.php?u='.$added_by.'"><img width="40" height="40" src="'.$row_pic1['avatar'].'" /></a>&nbsp;&nbsp;<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a><b style="float:right;">'.$date_added.'</b><p style="white-space:pre-line;">'.$body.'</p><hr style="background-color: #06F; height: 1px;"/>';
        }
	}else{
		$query2 = mysql_query("SELECT * FROM comments WHERE post_id='$postid'");
        while($row2 = mysql_fetch_array($query2)){
            $id2 = $row2['id'];
            $body2 = $row2['comment_body'];
            $date_added2 = $row2['date'];
            $added_by2 = $row2['comment_user'];
            $row_pic12 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$added_by' "));
            echo '<a href="otherprofile.php?u='.$added_by2.'"><img width="40" height="40" src="'.$row_pic12['avatar'].'" /></a>&nbsp;&nbsp;<a href="otherprofile.php?u='.$added_by2.'">'.$added_by2.'</a><b style="float:right;">'.$date_added2.'</b><p style="white-space:pre-line;">'.$body2.'</p><hr style="background-color: #06F; height: 1px;"/>';
        }
	}
?>