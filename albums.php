<title>Albums</title>
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
	$admin_albums = true;
} else if ($query ['user_pos'] == 'mod') {
	$mod_albums = true;
} else {
	echo '<p class="error">You are not an adminstrator or a moderator</p>';
	include 'inc/aside.inc.php';
	include 'inc/footer.inc.php';
	die ();
}

include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Albums</h2><hr>
	<div id="albums">
		<div class="row">

	<?php
	$id = 1;
	$query = mysql_query ( "SELECT * FROM albums" );
	while ( $row = mysql_fetch_array ( $query ) ) {
		?>
                
			<div class="col-md-3">
				<div class='panel panel-default' style='width: 200px;'>
					<div class='panel-heading'>
						<h4>
							<a href='viewAlbum.php?id=<?php echo $row['id']; ?>'><?php echo $row['name']; ?></a>
						</h4>
					</div>
					<div class='panel-body'>
						<h4 style="color: #090;">Category:</h4>
						<h4 style="color: #C00;"><?php echo $row['category']; ?></h4>
						<h4 style="color: #090;">Created By:</h4>
						<h4 style="color: #C00;"><?php echo $row['user']; ?></h4>
						<h4 style="color: #090;">Date Created:</h4>
						<h4 style="color: #C00;"><?php echo $row['date']; ?></h4>

						<button
							onclick="javascript: delete_album('<?php echo $row['id']; ?>')"
							class="btn btn-primary">Delete</button>
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
</div>
<script src="js/delete_album.js"></script>
<?php include 'inc/footer.inc.php'; ?>