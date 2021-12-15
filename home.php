<title>Home</title>
<?php
include("./inc/header.inc.php");
	if(isset($_SESSION['user_login'])){
		$check2 = mysql_query("SELECT activated FROM users WHERE username='$un'");
		$ac_row = mysql_fetch_assoc($check2);
		if(!$ac_row['activated'] == 1){
			echo '<p class="error">This account is not activated.</p>';
			include_once 'inc/footer.inc.php';
			exit();
		}
		
	}else{
		echo '<p class="error">You should login in</p>';
		include ("./inc/footer.inc.php");
		exit();
	}
	include 'inc/vars.inc.php';
	$home = true;
	include 'inc/aside.inc.php';
?>
<div class="col-md-9">
Hello, <?php echo $un; ?><br/>
Would you like to <a href="logout.php">Log out</a>

</div>
</div>
<?php include ("./inc/footer.inc.php"); ?>