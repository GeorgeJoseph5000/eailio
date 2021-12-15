<script type="text/javascript" src="js/post.js"></script>
<script src="js/comments_likes.js"></script>
<title>Posts</title>
<?php
include 'inc/header.inc.php';
if(!isset($_SESSION['user_login'])){
	echo '<p class="error">You should Log in</p>';
	include('inc/footer.inc.php');
	exit();
}else{
	$check2 = mysql_query("SELECT activated FROM users WHERE username='$un'");
	$ac_row = mysql_fetch_assoc($check2);
	if(!$ac_row['activated'] == 1){
		echo '<p class="error">This account is not activated.</p>';
		include_once 'inc/footer.inc.php';
		exit();
	}
}

include 'inc/vars.inc.php';
$posts = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Posts</h2><hr/>
	<button data-toggle="modal" data-target="#mypost" class="btn btn-primary">Write a Post!</button>
	<br/><br/>
	<div id="post_show">
		<?php include 'inc/posts.inc.php';?>
	</div>
	<?php include 'inc/write_posts.inc.php'; ?>
	</div>
	</div>
<?php include('inc/footer.inc.php'); ?>