<title>All Users</title>
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
$query = mysql_fetch_assoc(mysql_query("SELECT user_pos FROM users WHERE username='$un'"));
include 'inc/vars.inc.php';
if($query['user_pos'] == 'admin'){
	$admin_users = true;
}else{
	echo '<p class="error">You are not an adminstrator</p>';
	include 'inc/aside.inc.php';
	include 'inc/footer.inc.php';
	die();
}
include 'inc/aside.inc.php';
?>

<div class="col-md-9">
<h2>Users</h2><hr/>
    <div id="unfriend_results">
	 <div class="row">
	<?php
		$id = 1;
		$query = mysql_query("SELECT * FROM users");
		while($row = mysql_fetch_array($query)){
		if($row['username'] != $un){
                ?>
                
			<div class="col-md-3">
                <div class='panel panel-default' style='width:200px;'>
			<div class='panel-heading'>
                <h4><a href='otherprofile.php?u=<?php echo $row['username']; ?>'><?php echo $row['username']; ?></a></h4>
  	    	   </div>
  	    	   <div class='panel-body'>
  	    	    <h4 style="color:#090;">Full Name: </h4><h4 style="color:#C00;"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h4>
	  	    	<h4 style="color:#090;">Gender: </h4><h4 style="color:#C00;"><?php echo $row['gender']; ?></h4>
				<h4 style="color:#090;">Country: </h4><h4 style="color:#C00;"><?php echo $row['country']; ?></h4>
                <h4 style="color:#090;">Date Created: </h4><h4 style="color:#C00;"><?php echo $row['date']; ?></h4>
				
		<button onclick="javascript: delete_user('<?php echo $row['username']; ?>')" class="btn btn-primary">Delete</button>
		<button style="margin-top: 5px;" onclick="javascript: send_message('<?php echo $row['username']; ?>')" class="btn btn-primary">Send Message</button>
        <?php 
                    
					if($row['user_pos'] == 'admin'){
						?><button style="margin-top: 5px;" onclick="javascript: make_mod('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Moderator</button>
                    <button style="margin-top: 5px;" onclick="javascript: make_nor('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Normal</button>
                    <?php 
					}
					if($row['user_pos'] == 'mod'){
					?><button style="margin-top: 5px;" onclick="javascript: make_admin('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Adminstrator</button>
        		<button style="margin-top: 5px;" onclick="javascript: make_nor('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Normal</button>
                    <?php 
					}
					if($row['user_pos'] == 'nor'){
					?><button style="margin-top: 5px;" onclick="javascript: make_mod('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Moderator</button>
                    <button style="margin-top: 5px;" onclick="javascript: make_admin('<?php echo $row['username']; ?>')" class="btn btn-primary">Make Admin</button>
                    <?php 
					}?>
              </div>
              </div>
              </div>
		<?php
			$id++;
                }
		}
	?>
</div>
<div id="mod_admin_reults"></div>
</div>

</div>
</div>
<p id="un" style="display: none;"><?php echo $un; ?></p>
<script src="js/remove_friend.js"></script>
<script src="js/make_pos.js"></script>
<?php include 'inc/footer.inc.php'; ?>