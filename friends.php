<title>Friends</title>
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
$friends = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Friends</h2><hr/>
<div class='row'>
  <?php
	$id=1;
  	$message = '';
  	$friend_check = mysql_query("SELECT * FROM users WHERE username='$un'");
	$row = mysql_fetch_assoc($friend_check);
	$friends = $row['friends_array'];
	$explode = explode(",", $friends);
	$count = count($explode);
	
	if ($friends == "") {
		$count = count(NULL);
	}
	if($count == 0){
		$message = "<span class='error'>$un hasn't friends!</span>";
	}else{
		foreach (array_slice($explode,1) as $key => $value) {
			$row_pic = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$value'"));
			echo "
			<div class='col-md-3'>
				<div class='panel panel-default' style='width:200px;'>
				<div class='panel-heading'>
					<h4><a href='otherprofile.php?u=$value'>
							$value
						</a></h4></div>
					<div style='text-align:center;' class='panel-body'>
					<h4>
						<a href='otherprofile.php?u=$value'>
							<img src='".$row_pic['avatar']."' width='50' height='50' /><br/>
						</a>
						
					</h4>
				";
				    ?><input onclick="javascript: delete_friend_pram('<?php echo $value; ?>')" <?php echo " type='submit' style='margin-top:10px;' class='btn btn-default' name='unfriend' value='UnFriend' />&nbsp;&nbsp;&nbsp;
				    ";?><input type='submit' onclick="javascript: send_message('<?php echo $value; ?>')" <?php echo "style='margin-top:10px;' class='btn btn-default' name='send_msg' value='Send Message' />
				</div></div></div>";
			$id++;
			$user = $value;
		}
	}
  ?>
<br/><br/>
 <div id="unfriend_results"></div><br/><br/>
 </div>
 </div>
 </div>
 <p id="un" style="display:none;"><?php echo $_SESSION['user_login']; ?></p>
 <script type="text/javascript" src="js/remove_friend.js"></script>
<?php include 'inc/footer.inc.php'; ?>