<?php
    include_once("inc/connect.inc.php");
	session_start();
	if (isset($_SESSION['user_login'])) {
		$un = $_SESSION['user_login'];
	}else{
		$un = "";
	}
    if(!isset($_SESSION['user_login'])){
	echo '<p class="error">You should Log in</p>';
	exit();
}else{
	$check2 = mysql_query("SELECT activated FROM users WHERE username='$un'");
	$ac_row = mysql_fetch_assoc($check2);
	if(!$ac_row['activated'] == 1){
		echo '<p class="error">This account is not activated.</p>';
		exit();
	}
}
$post_id = $_GET['id'];
?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<script src="js/comments_likes.js"></script>

<div class="row">
    <div class="col-md-6">
        <textarea class="form-control" id="comment"></textarea><br/>
        <input type="submit" data-dismiss="modal" onclick="javascript: send_comment()" name="send" value="Comment" class="btn btn-primary"/><br/><br/>
        <p id="postid" style="display:none;"><?php echo $post_id; ?></p>
    </div>
    <div class="col-md-6">
        <div id="comments_show">
        <?php
        $query = mysql_query("SELECT * FROM comments WHERE post_id='$post_id' ORDER BY `id` DESC");
        while($row = mysql_fetch_array($query)){
            $id = $row['id'];
            $body = $row['comment_body'];
            $date_added = $row['date'];
            $added_by = $row['comment_user'];
            $row_pic1 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$added_by' "));
            echo '<a target="_blank" href="otherprofile.php?u='.$added_by.'"><img width="40" height="40" src="'.$row_pic1['avatar'].'" /></a>&nbsp;&nbsp;<a target="_blank" href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a><b style="float:right;">'.$date_added.'</b><p style="white-space:pre-line;">'.$body.'</p><hr style="background-color: #06F; height: 1px;"/>';
        }
        ?>
        </div>
    </div> 
</div>
