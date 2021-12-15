<title>Sent Messages</title>
<?php include 'inc/header.inc.php'; ?>
<?php 
if(!isset($_SESSION['user_login'])){
    echo '<p class="error">You should Log in<p/>';
	include 'inc/footer.inc.php';
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
$sent = true;
include 'inc/aside.inc.php';
?>      
<div class="col-md-9">         
<h2>Sent Messages</h2>
<hr/>
  <div class="row">
  <?php
  $id=1;
  	$message2 = '';
  	$query = mysql_query("SELECT * FROM messages WHERE user_from='$un'");
  	if(mysql_num_rows($query) == 0){
  		$message2 = '<span class="error">You do not have unread messages.</span>';
  	}else{
  		  	while ($row = mysql_fetch_array($query)) {
	  		$subject = $row['subject'];
	  		$from = $row['user_from'];
	  		$body = $row['msg_body'];
	  		$date = $row['date'];
	  		$album = $row['album'];
	  		$photo = $row['photo'];
	  		$row_pic = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$from'"));
	  		echo "<div class='col-md-3'><div class='panel panel-default' style='width:200px;'>
				<div class='panel-heading'>
				<h4><a href='viewmessage.php?id=".$row['id']."'>$subject</a></h4>
				</div>
				<div style='text-align:center;' class='panel-body'>
	  		<h4>From <a href='otherprofile.php?u=$from'>$from</a></h4>
	  		
	  		<h4>Sent in $date</h4>";
	  		//$idalbum = mysql_fetch_assoc(mysql_query("SELECT id FROM albums WHERE user = '$from' AND name = $album"));
	  		//$idphoto = mysql_fetch_assoc(mysql_query("SELECT id FROM photos WHERE user = '$from' AND name = $photo"));
	  		if($album != "none"){
	  		echo '
	  		<h4>Album: '.$album.'</h4>';
	  		}
	  		if($photo != "none"){
	  			echo '
	  		<h4>Photo: '.$photo.'</h4>';
	  		}
	  		 
	  		echo "
	  		</div></div></div>";
	  		$id++;
	  	}
  	}
  ?>
  </div>
<?php echo $message2; ?> 
 </div>
</div>
 <?php include 'inc/footer.inc.php'; ?>