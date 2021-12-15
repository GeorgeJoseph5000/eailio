<?php
session_start();
$un = $_POST['user'];
include('../inc/connect.inc.php');

mysql_query("UPDATE users SET user_pos = 'mod' WHERE username = '$un'");

?>
	 <div class="row">
	<?php
		$id = 1;
		$query = mysql_query("SELECT * FROM users");
		while($row = mysql_fetch_assoc($query)){
			if($row['username'] != $_SESSION['user_login']){
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
<div id="mod_admin_reults"><?php
echo '<span class="good">User '.$un.' became Moderator</span>';
?></div>
