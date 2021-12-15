<div class="row">
<div class="col-md-3">
<aside>
<?php
	$query = mysql_fetch_assoc(mysql_query("SELECT user_pos FROM users WHERE username='$un'"));
	if($query['user_pos'] == 'admin'){
		?>
		<div id="posAsideLinks">
			<h3>Adminstrator</h3>
			<div>
				<?php
					if($admin_users == true){
						echo '<div id="opened"><a href="users.php">Users</a></div>';
					}else{
						echo '<div><a href="users.php">Users</a></div>';
					}
					if($admin_posts == true){
						echo '<div id="opened"><a href="ad_posts.php">Posts</a></div>';
					}else{
						echo '<div><a href="ad_posts.php">Posts</a></div>';
					}
					if($admin_messages == true){
						echo '<div id="opened"><a href="messages.php">Messages</a></div>';
					}else{
						echo '<div><a href="messages.php">Messages</a></div>';
					}if($admin_albums == true){
						echo '<div id="opened"><a href="albums.php">Albums</a></div>';
					}else{
						echo '<div><a href="albums.php">Albums</a></div>';
					}if($admin_photos == true){
						echo '<div id="opened"><a href="photos.php">Photos</a></div>';
					}else{
						echo '<div><a href="photos.php">Photos</a></div>';
					}
				?>
			</div>
		</div>
		<?php
	}else if($query['user_pos'] == 'mod'){
		?>
		<div id="posAsideLinks">
			<h3>Moderator</h3>
			<div>
				<?php
					if($mod_posts == true){
						echo '<div id="opened"><a href="ad_posts.php">Posts</a></div>';
					}else{
						echo '<div><a href="ad_posts.php">Posts</a></div>';
					}
					if($mod_messages == true){
						echo '<div id="opened"><a href="messages.php">Messages</a></div>';
					}else{
						echo '<div><a href="messages.php">Messages</a></div>';
					}
					if($mod_albums == true){
						echo '<div id="opened"><a href="albums.php">Albums</a></div>';
					}else{
						echo '<div><a href="albums.php">Albums</a></div>';
					}
					if($mod_photos == true){
						echo '<div id="opened"><a href="photos.php">Photos</a></div>';
					}else{
						echo '<div><a href="photos.php">Photos</a></div>';
					}
				?>
				
				
			</div>
		</div>
		<?php
	}
	
?>
<div id="asideLinks">
	<h3>Account</h3>
	<div>
		<?php
			if($settings == true){
				echo '<div id="opened"><a href="account_settings.php">Settings</a></div>';
			}else{
				echo '<div><a href="account_settings.php">Settings</a></div>';
			}
			if($friends == true){
				echo '<div id="opened"><a href="friends.php">Friends</a></div>';
			}else{
				echo '<div><a href="friends.php">Friends</a></div>';
			}
			if($find_friends == true){
				echo '<div id="opened"><a href="find_friends.php">Find Friends</a></div>';
			}else{
				echo '<div><a href="find_friends.php">Find Friends</a></div>';
			}
			echo '<div><a href="profile.php?u='.$un.'">Profile</a></div>';
			if($home == true){
				echo '<div id="opened"><a href="home.php">Home</a></div>';
			}else{
				echo '<div><a href="home.php">Home</a></div>';
			}
			if($posts == true){
				echo '<div id="opened"><a href="posts.php">Posts</a></div>';
			}else{
				echo '<div><a href="posts.php">Posts</a></div>';
			}
			if($requests == true){
				echo '<div id="opened"><a href="friends_requests.php">Friend Requests</a></div>';
			}else{
				echo '<div><a href="friends_requests.php">Friend Requests</a></div>';
			}
			echo '<div><a href="logout.php">Logout</a></div>';
		?>
	</div>
</div>
<div id="asideLinks">
	<h3>Messages</h3>
	<div>
		<?php
		$ex_query = mysql_query("SELECT COUNT(*) AS total FROM messages WHERE user_to='$un' AND opened='no'");
		$row_ex = mysql_fetch_assoc($ex_query);
		if($inbox == true){
			echo '<div id="opened"><a href="inbox.php">Inbox('.$row_ex['total'].')</a></div>';
		}else{
			echo '<div><a href="inbox.php">Inbox('.$row_ex['total'].')</a></div>';
		}
		if($sent == true){
			echo '<div id="opened" ><a href="sent.php">Sent</a></div>';
		}else{
			echo '<div><a href="sent.php">Sent</a></div>';
		}
		if($trash == true){
			echo '<div id="opened" ><a href="trash.php">Trash</a></div>';
		}else{
			echo '<div><a href="trash.php">Trash</a></div>';
		}
		?>
	</div>
</div>
<div id="asideLinks">
	<h3>Pictures</h3>
	<div>
		<?php
			if($albums == true){
				echo '<div id="opened"><a href="manage_albums.php">Albums</a></div>';
			}else{
				echo '<div><a href="manage_albums.php">Album</a></div>';
			}
			if($albums_add == true){
				echo '<div id="opened"><a href="add_album.php">Add an Album</a></div>';
			}else{
				echo '<div><a href="add_album.php">Add an Album</a></div>';
			}
			if($photos == true){
				echo '<div id="opened" ><a href="manage_photos.php">Photos</a></div>';
			}else{
				echo '<div><a href="manage_photos.php">Photos</a></div>';
			}
			if($photos_add == true){
				echo '<div id="opened" ><a href="add_photo.php">Add a Photo</a></div>';
			}else{
				echo '<div><a href="add_photo.php">Add a Photo</a></div>';
			}
		?>
	</div>
</div>
<div id="asideLinks">
	<h3>Programs</h3>
	<div>
		<?php
			if($tryit == true){
				echo '<div id="opened" ><a href="tryit.php">Tryit</a></div>';
			}else{
				echo '<div><a href="tryit.php">Tryit</a></div>';
			}
			if($messanger == true){
				echo '<div id="opened" ><a href="see_avaliable_friends.php">Messanger</a></div>';
			}else{
				echo '<div><a href="see_avaliable_friends.php">Messanger</a></div>';
			}
		?>
	</div>
</div>
</aside>
</div>