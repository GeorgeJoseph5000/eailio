<?php
     include 'inc/header.inc.php';
?>
<title>Friends Requests</title>
<?php
	if (!isset($_SESSION['user_login']) ){
		echo '<p class="error">You shold Log in</p>';
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
?>
<?php
include 'inc/vars.inc.php';
$requests = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Friend Requests</h2><hr/>
<?php
     $findRequests = mysql_query("SELECT * FROM friends_requests WHERE user_to='$un'");
     if(mysql_num_rows($findRequests) == 0){
        echo '<div style="background:white;" class="friends"><h3 style="background:white;">You have no friends requests</h3></div>';                        
     }else{
		 echo '<div class="friends"><h2>Friends Requests</h2>';
     	while($row = mysql_fetch_array($findRequests)){
     		$from = $row['user_from'];
			$findAv = mysql_query("SELECT * FROM users WHERE username='$from'");
			$row2 = mysql_fetch_assoc($findAv);
			$avatar = $row2['avatar'];
		

?>
<br/><img src='<?php echo $avatar; ?>' width='70'/><br/>
<h3 style='background:white;'><a style='background:white;' href='otherprofile.php?u=<?php echo $from; ?>'><?php echo $from; ?></a> wants to be your friend.</h3><br/>
<form id="form" style="background:white;" action="friends_requests.php" method="post"><input type="submit" name="accept" class="btn btn-primary" value="Accept" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" name="decline" value="Decline" /></form><hr/><br/><br/>
<?php 
}

if(isset($_POST['accept'])){
	$add_friend_check = mysql_query("SELECT friends_array FROM users WHERE username='$un'");
	$get_row = mysql_fetch_assoc($add_friend_check);
	$get_friends = $get_row['friends_array'];
	$get_explode = explode(",", $get_friends);

	$add_friend_check_from = mysql_query("SELECT friends_array FROM users WHERE username='$from'");
	$get_row_from = mysql_fetch_assoc($add_friend_check_from);
	$get_friends_from = $get_row_from['friends_array'];
	$get_explode_from = explode(",", "$get_friends_from");

	if (!in_array($un,$get_explode) && !in_array($from,$get_explode_from)) {
		$add_friendship = mysql_query("UPDATE users SET friends_array=CONCAT(friends_array,',$un') WHERE username='$from'");
		$add_friendship = mysql_query("UPDATE users SET friends_array=CONCAT(friends_array,',$from') WHERE username='$un'");
		$remove_request = mysql_query("DELETE FROM friends_requests WHERE user_to='$un' AND user_from='$from'");
		echo "<span class='good'>$from is your friend</span><br/><br/>";
	}else{
		echo "<span class='error'>You can't click because you are friends</span><br/><br/>";
	}
}
if (isset($_POST['decline'])) {
		$remove_request = mysql_query("DELETE FROM friends_requests WHERE user_to='$un' AND user_from='$from'");
		echo "<span class='good'>$from's friends request is canceled</span><br/><br/>";
}
}
echo '</div>';
?>
</div>
</div>

</div>
<div>
<br/>
<br/>
<br/>
<br/>
<?php include 'inc/footer.inc.php'?>