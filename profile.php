<script type="text/javascript" src="js/post.js"></script>
<?php include("./inc/header.inc.php");

    if(isset($_SESSION['user_login'])){
		if(isset($_GET['u'])){
			$username = mysql_real_escape_string($_GET['u']);
			if(ctype_alnum($username)){
				$check = mysql_query("SELECT * FROM users WHERE username='$username'");
				$row_pic = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$un' "));
				$add_friend_check = mysql_query("SELECT * FROM users WHERE username='$un'");
				$get_row = mysql_fetch_assoc($add_friend_check);
				$get_friends = $get_row['friends_array'];
				$get_explode = explode(",", $get_friends);
				$get_count = count($get_explode);
				echo "<title>$un 's Profile</title>";
				if(mysql_num_rows($check) == 1){
					if($username == $_SESSION['user_login']){
						$check2 = mysql_query("SELECT activated FROM users WHERE username='$username'");
						$ac_row = mysql_fetch_assoc($check2);
						if($ac_row['activated'] != 1){
								echo '<p class="error">This account is not activated.</p>';
								include_once 'inc/footer.inc.php';
								exit();
							}
						}else{
							echo'<script> window.location="index.php"; </script> ';
							exit();
						}
				}else{
					echo'<script> window.location="index.php"; </script> ';
					exit();
				}
			}
		}else{echo'<script> window.location="index.php"; </script> ';exit();}
	}else{
	    echo '<p class="error">You should Log in<p/>';
		include 'inc/footer.inc.php';
	    exit();
	}
?>
<title><?php echo $un; ?>'s Profile</title>

<?php
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$firstname = $get['firstname'];
	$lastname = $get['lastname'];
	$country = $get['country'];
	$gender = $get['gender'];
	$address = $get['address'];
	$about = $get['About'];
	$place = $get['place'];
?>
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<img style="text-align:center;" src="<?php echo $row_pic['avatar']; ?>" class="img img-responsive" height="370" width="370" alt="<?php echo "$firstname"; ?> 's Profile" title="<?php echo "$firstname"; ?> 's Profile"/><br/>
	</div>
	<div class="col-md-4">
	</div>
</div>

<div class="row">
	<div class="col-sm-10">
			<h4 style="color:#090">First Name: </h4><h4 style="color:#C00"><?php echo $firstname; ?></h4>
			<h4 style="color:#090">Last name: </h4><h4 style="color:#C00"><?php echo $lastname; ?></h4>
			<h4 style="color:#090">Country: </h4><h4 style="color:#C00"><?php echo $country; ?></h4>
			<h4 style="color:#090">Gender: </h4><h4 style="color:#C00"><?php echo $gender; ?></h4>
			<h4 style="color:#090">Address: </h4><h4 style="color:#C00"><?php echo $address; ?></h4>
			<h4 style="color:#090">About: </h4></h4><h4 style="color:#C00"><?php echo $about; ?></h4>
			<h4 style="color:#090">Work Or School: </h4></h4><h4 style="color:#C00"><?php echo $place; ?></h4>
	</div><br/>
	<div class="col-sm-2">
		<a href="account_settings.php" class="btn btn-primary">Edit Your Account!</a><br/>
	</div>
</div>
<div class="row" style="margin-top:10px;">
<h3>Your Friends</h3><br>
<?php
	if ($get_friends == "") {
		$get_count = count(NULL);
	}
	if($get_count == 0){
		echo "<span class='error'>$un hasn't friends!</span>";
	}else{
		foreach (array_slice($get_explode,1) as $key => $value) {
			$row_pic_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$value'"));
			$avatar = $row_pic_2['avatar'];
			echo "<a class='img_fri' href='otherprofile.php?u=$value'><img src='$avatar' height='50' title='$value' alt='$value' width='40'/></a>&nbsp;&nbsp;";
		}
	}
?>
</div>
<?php include("./inc/footer.inc.php"); ?>