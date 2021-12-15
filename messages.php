<title>All Messages</title>
<?php include 'inc/header.inc.php'; ?>
<?php

if (! isset ( $_SESSION ['user_login'] )) {
	echo '<p class="error">You should Log in<p/>';
	include 'inc/footer.inc.php';
	exit ();
} else {
	$check2 = mysql_query ( "SELECT activated FROM users WHERE username='$un'" );
	$ac_row = mysql_fetch_assoc ( $check2 );
	if (! $ac_row ['activated'] == 1) {
		echo '<p class="error">This account is not activated.</p>';
		include_once 'inc/footer.inc.php';
		exit ();
	}
}
$query = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='$un'" ) );
include 'inc/vars.inc.php';
if ($query ['user_pos'] == 'admin') {
	$admin_messages = true;
} else if ($query ['user_pos'] == 'mod') {
	$mod_messages = true;
} else {
	echo '<p class="error">You are not an adminstrator or a moderator</p>';
	include 'inc/aside.inc.php';
	include 'inc/footer.inc.php';
	die ();
}

include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Messages</h2><hr/>
	<div class="row">
	<?php
	$id = 1;
	$query = mysql_query ( "SELECT * FROM messages" );
	$pos = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='$un'" ) );
	while ( $row = mysql_fetch_assoc ( $query ) ) {
		?>
			<div class="col-md-3">

			<div class='panel panel-default' style='width: 200px;'>
				<div class='panel-heading'>
					<h4>
						<a
							href='viewmessage_admin.php?id=<?php echo $row['id']; ?>'><?php echo $row['subject']; ?></a>
					</h4>
				</div>
				<div class='panel-body'>
					<h4 style="color: #090;">User From:</h4>
					<h4 style="color: #C00;">
						<a href='otherprofile.php?u=<?php echo $row['user_from']; ?>'><?php echo $row['user_from']; ?></a>
					</h4>
					<h4 style="color: #090;">User To:</h4>
					<h4 style="color: #C00;">
						<a href='otherprofile.php?u=<?php echo $row['user_to']; ?>'><?php echo $row['user_to']; ?></a>
					</h4>
					<h4 style="color: #090;">Date:</h4>
					<h4 style="color: #C00;"><?php echo $row['date']; ?></h4>
					<h4 style="color: #090;">Opened:</h4>
					<h4 style="color: #C00;"><?php echo $row['opened']; ?></h4>
					<h4 style="color: #090;">Trash:</h4>
					<h4 style="color: #C00;"><?php echo $row['trash']; ?></h4>
					<h4 style="color: #090;">Album:</h4>
					<h4 style="color: #C00;"><?php echo $row['album']; ?></h4>
					<h4 style="color: #090;">Photo:</h4>
					<h4 style="color: #C00;"><?php echo $row['photo']; ?></h4>
				</div>
			</div>
		</div>
		<?php
		$id ++;
	}
	?>
	</div>
</div>
</div>
<?php include 'inc/footer.inc.php'; ?>