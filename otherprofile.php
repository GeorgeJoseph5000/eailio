<?php
include ("./inc/header.inc.php");

if (isset ( $_GET ['u'] )) {
	$username = mysql_real_escape_string ( $_GET ['u'] );
	if (ctype_alnum ( $username )) {
		echo "<title>$username's Profile</title>";
		$check = mysql_query ( "SELECT * FROM users WHERE username='$username'" );
		$check2 = mysql_query ( "SELECT activated FROM users WHERE username='$username'" );
		$ac_row = mysql_fetch_assoc ( $check2 );
		if (mysql_num_rows ( $check ) == 1) {
			if ($ac_row ['activated'] == 1) {
				if (isset ( $_SESSION ['user_login'] )) {
					if ($username == $_SESSION ['user_login']) {
						echo '<script> window.location="profile.php?u=' . $_SESSION ['user_login'] . '" </script> ';
						exit ();
					}
				}
				$un = $username;
				$row_pic = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM users WHERE username='$un' " ) );
			} else {
				echo '<p class="error">This account is not activated.</p>';
				include_once 'inc/footer.inc.php';
				exit ();
			}
		} else {
			echo '<script> window.location="index.php"; </script> ';
			exit ();
		}
	}
} else {
	echo '<script> window.location="index.php"; </script> ';
	exit ();
}
?>

<?php
$get = mysql_fetch_assoc ( $check );
$username = $get ['username'];
$firstname = $get ['firstname'];
$lastname = $get ['lastname'];
$country = $get ['country'];
$gender = $get ['gender'];
$address = $get ['address'];
$about = $get ['About'];
$place = $get ['place'];
$message = "";
if (isset ( $_POST ['addfriend'] )) {
	$user_to = $username;
	$user_from = $_SESSION ['user_login'];
	$ex_f = mysql_query ( "INSERT INTO friends_requests VALUES ('','$user_from','$user_to')" );
	$message = '<br/><span class="good">Your friend request have been sent.</span><br/><br/>';
}
if (isset ( $_POST ['sendmsg'] )) {
	echo '<script> window.location="send_msg.php?u=' . $un . '"; </script> ';
}
?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<img style="text-align: center;" class="img img-responsive"
			src="<?php echo $row_pic['avatar']; ?>" height="370" width="370"
			alt="<?php echo "$firstname"; ?> 's Profile"
			title="<?php echo "$firstname"; ?> 's Profile" /><br />
	</div>
	<div class="col-md-4"></div>
</div>

<div class="row">
	<div class="col-md-8">
		<h4 style="color: #090">First Name:</h4>
		<h4 style="color: #C00"><?php echo $firstname; ?></h4>
		<h4 style="color: #090">Last name:</h4>
		<h4 style="color: #C00"><?php echo $lastname; ?></h4>
		<h4 style="color: #090">Country:</h4>
		<h4 style="color: #C00"><?php echo $country; ?></h4>
		<h4 style="color: #090">Gender:</h4>
		<h4 style="color: #C00"><?php echo $gender; ?></h4>
		<h4 style="color: #090">Address:</h4>
		<h4 style="color: #C00"><?php echo $address; ?></h4>
		<h4 style="color: #090">About:</h4>
		<h4 style="color: #C00"><?php echo $about; ?></h4>
		<h4 style="color: #090">Work Or School:</h4>
		<h4 style="color: #C00"><?php echo $place; ?></h4>
	</div>
	<br />
	<div class="col-md-4">
	<?php
	$myquery = mysql_query ( "SELECT activated FROM users WHERE username='" . $_SESSION ['user_login'] . "'" );
	$rowq = mysql_fetch_assoc ( $myquery );
	if ($rowq ['activated'] == 1) {
		$add_friend_check = mysql_query ( "SELECT * FROM users WHERE username='" . $_SESSION ['user_login'] . "'" );
		$get_row = mysql_fetch_assoc ( $add_friend_check );
		$get_friends = $get_row ['friends_array'];
		$get_explode = explode ( ",", $get_friends );
		
		if (in_array ( $un, $get_explode )) {
			echo '<input type="submit" onclick="javascript: delete_friend();" class="btn btn-primary" value="Unfriend user" />
		    <form action="" method="post" style="margin-bottom:10px;margin-top:10px;">
		    <input style="margin-bottom:10px;margin-top:10px;" type="submit" name="sendmsg" class="btn btn-primary" value="Send Message" /></form>';
			echo '<div id="unfriend_results"></div>';
		} else {
			echo '<br/>
			<input style="margin-bottom:10px;margin-top:10px;" type="submit" class="btn btn-primary" onclick="javascript: addfriend();" value="Add Friend" />
		    <form style="margin-bottom:10px;margin-top:10px;" action="" method="post">
		    <input type="submit" name="sendmsg" class="btn btn-primary" value="Send Message" /></form>';
			echo '<div id="addfriend_results"></div>';
		}
		?>
		<div id="pos_results">
			<?php
			$query = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='" . $_SESSION ['user_login'] . "'" ) );
			if ($query ['user_pos'] == 'admin') {
				$query2 = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='" . $un . "'" ) );
				if ($query2 ['user_pos'] == 'admin') {
					?><button onclick="javascript: make_mod_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Moderator</button>
				<br />
				<button style="margin-top: 20px;"
					onclick="javascript: make_nor_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Normal</button>
								                    <?php
				}
				if ($query2 ['user_pos'] == 'mod') {
					?><button
					onclick="javascript: make_admin_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Adminstrator</button>
				<br />
				<button style="margin-top: 20px;"
					onclick="javascript: make_nor_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Normal</button>
								                    <?php
				}
				if ($query2 ['user_pos'] == 'nor') {
					?><button onclick="javascript: make_mod_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Moderator</button>
				<br />
				<button style="margin-top: 20px;"
					onclick="javascript: make_admin_other('<?php echo $un; ?>')"
					class="btn btn-primary">Make Admin</button>
								                    <?php
				}
			}
		}
		?>
	</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<h3><?php echo $un; ?>'s Friends</h3>
	<br>
<?php
$add_friend_check2 = mysql_query ( "SELECT * FROM users WHERE username='" .$_GET ['u'] . "'" );
$get_row2 = mysql_fetch_assoc ( $add_friend_check2 );
$get_friends2 = $get_row2 ['friends_array'];
$get_explode2 = explode ( ",", $get_friends2 );

if ($get_friends2 == "") {
	echo "<span class='error'>$un hasn't friends!</span>";
} else {
	foreach ( array_slice ( $get_explode2, 1 ) as $key => $value ) {
		$row_pic_2 = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM users WHERE username='$value'" ) );
		$avatar = $row_pic_2 ['avatar'];
		echo "<a class='img_fri' href='otherprofile.php?u=$value'><img src='$avatar' height='50' title='$value' alt='$value' width='40'/></a>&nbsp;&nbsp;";
	}
}
?>
</div>
<?php include("./inc/footer.inc.php"); ?>
<p id="username" style="display: none;"><?php echo $un; ?></p>
<p id="un" style="display: none;"><?php echo $_SESSION['user_login']; ?></p>
<script type="text/javascript" src="js/remove_friend.js"></script>
<script type="text/javascript" src="js/add_friend.js"></script>
<script src="js/make_pos.js"></script>
