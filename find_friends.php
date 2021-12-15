<title>Find Friends</title>
<?php
include 'inc/header.inc.php';
if(isset($_SESSION['user_login'])){
	$check2 = mysql_query("SELECT activated FROM users WHERE username='$un'");
	$ac_row = mysql_fetch_assoc($check2);
	if(!$ac_row['activated'] == 1){
		echo '<p class="error">This account is not activated.</p>';
		include_once 'inc/footer.inc.php';
		exit();
	}
	$row_pic = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$un'"));
}else{
	echo '<p class="error">You should Log in<p/>';
	include 'inc/footer.inc.php';
    exit();
}
include 'inc/vars.inc.php';
$find_friends = true;
include 'inc/aside.inc.php';
?>

<div class="col-md-9">
<h2>Find Friends</h2>
<hr/>
<div class='row'>
	<?php
		$id = 1;
		$query = mysql_query("SELECT * FROM users WHERE country = '".$row_pic['country']."' OR place = '".$row_pic['place']."'");
		while($row = mysql_fetch_assoc($query)){
		if($row['username'] != $un){
				  	
				  
                ?>
                <div class="col-md-3">
                	<div class='panel panel-default' style='width:200px;'>
				<div class='panel-heading'>
                <h4><a href='otherprofile.php?u=<?php echo $row['username']; ?>'><?php echo $row['username']; ?></a></h4>
                </div>
                <div class='panel-body'>
  	    	    <h4 style="color:#090;">Full name: </h4><h4 style="color:#C00;"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h4>
	  	    	<h4 style="color:#090;">Gender: </h4><h4 style="color:#C00;"><?php echo $row['gender']; ?></h4>
	  		    <h4 style="color:#090;">Country: </h4><h4 style="color:#C00;"><?php echo $row['country']; ?></h4>
                <h4 style="color:#090;">Account made in: </h4><h4 style="color:#C00;"><?php echo $row['date']; ?></h4>
                </div>
                </div>
              </div>
		<?php
			$id++;
                }
                
		}
	?>
</div>
</div>
</div>
<?php include 'inc/footer.inc.php'; ?>