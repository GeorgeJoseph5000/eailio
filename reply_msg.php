<?php
include ("./inc/header.inc.php");

if (isset ( $_SESSION ['user_login'] )) {
	$check2 = mysql_query ( "SELECT activated FROM users WHERE username='$un'" );
	$ac_row = mysql_fetch_assoc ( $check2 );
	if (! $ac_row ['activated'] == 1) {
		echo '<p class="error">This account is not activated.</p>';
		include_once 'inc/footer.inc.php';
		exit ();
	}
	if (isset ( $_GET ['u'] )) {
		if (isset ( $_GET ['id'] )) {
			$username = mysql_real_escape_string ( $_GET ['u'] );
			$id = mysql_real_escape_string ( $_GET ['id'] );
			if (ctype_alnum ( $username )) {
				$check = mysql_query ( "SELECT * FROM users WHERE username='$username'" );
				$check2 = mysql_query ( "SELECT * FROM messages WHERE id='$id'" );
				if (mysql_num_rows ( $check ) == 1) {
					if ($username == $un) {
						header ( "Location: otherprofile.php?u=" . $username );
						exit ();
					}
					$check3 = mysql_query ( "SELECT * FROM messages WHERE user_from='$username' AND id='$id'" );
					if (mysql_num_rows ( $check3 ) != 1) {
						header ( "Location: index.php" );
						exit ();
					}
				} else {
					header ( "Location: index.php" );
					exit ();
				}
				if (mysql_num_rows ( $check2 ) != 1) {
					header ( "Location: index.php" );
					exit ();
				}
			}
		} else {
			header ( "Location: index.php" );
			exit ();
		}
	} else {
		header ( "Location: index.php" );
		exit ();
	}
} else {
	echo '<p class="error">You should Log in<p/>';
	include 'inc/footer.inc.php';
	exit ();
}
include 'inc/vars.inc.php';
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
	<title>Reply to <?php echo $username; ?></title>
	<h2>Reply message to <?php echo $username; ?></h2>
	<hr/>
	<input id='subject' class="form-control" placeholder='Subject'
		type='text' /><br />
	<textarea rows="12" id="msg_body" class="form-control"
		placeholder='Enter a text message to reply to <?php echo $username ?>'></textarea>
	<br />
	<h5>When you want to post an album or a photo, leave the select
						options opened.</h5>
	<div class="row">
		<div class="col-md-6">
			<button style="margin-top: 5px;" class="btn btn-primary"
				id="BtnAlbums">Want An Album</button>
			<br />
			<div style="display: none" id="album">
				<h4>Add An Album:</h4>
				<select id="Albums">
					<option value="none">Don't Add Albums</option>
	<?php
	$queryalbums = mysql_query ( "SELECT * FROM albums WHERE user='$un'" );
	while ( $row = mysql_fetch_array ( $queryalbums ) ) {
		$name = $row ['name'];
		echo '<option value="' . $name . '">' . $name . '</option>';
	}
	?>
	</select>
			</div>
		</div>
		<div class="col-md-6">
			<button style="margin-top: 5px;" class="btn btn-primary"
				id="BtnPhotoes">Want a Photo</button>
			<br />
			<div style="display: none" id="photo">
				<h4>Add An Album:</h4>
				<select id="Photoes">
					<option value="none">Don't Add Photoes</option>
	<?php
	$queryalbums = mysql_query ( "SELECT * FROM photoes WHERE user='$un'" );
	while ( $row = mysql_fetch_array ( $queryalbums ) ) {
		$name = $row ['name'];
		echo '<option value="' . $name . '">' . $name . '</option>';
	}
	
	?>
</select>
			</div>
		</div>
	</div>
	<br>
	<input class="btn btn-default" type='submit' value='Send Message'
		name='submit' onclick="send_Message()" /><br /> <br />
	<p id="message_results" />


	<p id="username" style="display: none;"><?php echo $username; ?></p>
	<p id="un" style="display: none;"><?php echo $un ;?></p>
	<script type="text/javascript">
$("#BtnAlbums").click(function () {
	    if ($("#album").is(":hidden") && $("#photo").is(":hidden")) {
	        $("#album").slideDown("fast");
	    } else {
	        $("#album").slideUp("fast");
	    }
	});
	$("#BtnPhotoes").click(function () {
	    if ($("#album").is(":hidden") && $("#photo").is(":hidden")) {
	        $("#photo").slideDown("fast");
	    } else {
	        $("#photo").slideUp("fast");
	    }
	});
	</script>
</div>
</div>
<script type="text/javascript" src="js/send_msg.js"></script>
<?php include 'inc/footer.inc.php'; ?>
<p id="username" style="display: none;"><?php echo $username; ?></p>
<p id="un" style="display: none;"><?php echo $un ;?></p>
