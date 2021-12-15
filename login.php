<?php
 include_once("inc/header.inc.php");
	$error_message = "";	
	if (isset($_POST['user_login']) && isset($_POST['password_login'])) {
		if ($_POST['user_login'] == "" || $_POST['password_login'] == "") {
			$error_message  = '<span class="error">';
			$error_message.='Enter all fields.';
			$error_message.='</span>';
	}else{
		$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['user_login']);
		$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['password_login']);
		$query = "SELECT * FROM users WHERE username='$user_login' AND password='$password_login' LIMIT 1";
		$query_ex = mysql_query($query);
		$query_nr = mysql_num_rows($query_ex);
		if($query_nr == 1){
			$_SESSION['user_login'] = $user_login;
            mysql_query("UPDATE users SET avalabile = 'true' WHERE username = '".$_SESSION['user_login']."'");
			echo'<script> window.location="home.php"; </script> ';
		}else{
			$error_message  = '<span class="error">';
			$error_message.='Information is fake.';
			$error_message.='</span>';
		}
	}
}
?>
<title>Login</title>
<div class="row">
	<div class="col-md-4">
<h2>Already member? Login in here!</h2>
<hr/>
<form method="POST">
	<input type="text" name="user_login" placeholder="Username" class="form-control" /><br />
	<input type="password" name="password_login" class="form-control" placeholder="Password" /><br />
	<input type="submit" class="btn btn-default" name="log" value="Login" /><br/><br>
	<?php echo $error_message; ?>
</form>
</div>
<div class="col-md-8"><img src="https://www.incimages.com/uploaded_files/image/1920x1080/getty_1173146314_417254.jpg" style="width: 100%;"/></div>
</div>
<?php error_reporting(0);if($_GET['message']=="active"){echo'<span class="good">Your account is activated.</span>';} include_once("./inc/footer.inc.php"); ?>