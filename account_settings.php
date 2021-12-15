<title>Account Settings</title>
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
?>
<?php
$error_message = "";
$good_message = "";
if(isset($_POST['cp'])){
	if(isset($_POST['op']) && isset($_POST['np'])){
		$op = $_POST['op'];
		$np = $_POST['np'];
		if($op != "" || $np != ""){
			if(strlen($op) > 3 && strlen($op) < 25){
				if(strlen($np) > 3 && strlen($np) < 25){
			$query = mysql_query("SELECT * FROM users WHERE username='$un'");
				while($row = mysql_fetch_assoc($query)){
					if($row['password'] == $op){
						$query_2 = mysql_query("UPDATE users SET password='$np'") or die("Can not update"); 
						$good_message = '<span class="good">';
						$good_message.= 'Password updates';
						$good_message.= '</span><br/><br/>';
					}else{
						$error_message = '<span class="error">';
						$error_message.= 'Password is incorrect';
						$error_message.= '</span><br/><br/>';
					}
				}
		}else{
		$error_message = '<span class="error">';
		$error_message.= 'New password is fake.';
		$error_message.= '</span><br/><br/>';	
	}
	}else{
		$error_message = '<span class="error">';
		$error_message.= 'Old password is fake.';
		$error_message.= '</span><br/><br/>';	
	}
}else{
	$error_message = '<span class="error">';
	$error_message.= 'Enter all fields';
	$error_message.='</span><br/><br/>';
}
}
}
?>
<?php
$error_message_2 ="";
$good_message_2 ="";
if(isset($_POST['ui'])){
	$fn = @$_POST['fn'];
	$ln = @$_POST['ln'];
	$c = @$_POST['countries'];
	$g = @$_POST['gender'];
	$ad = @$_POST['add'];
	$ab = @$_POST['about'];
	$pl = @$_POST['place'];
	if($fn == "" || $ln == "" || $c == "" || $ad == "" || $ab == "" || $pl == ""){
		$error_message_2 = '<span class="error">';
		$error_message_2.="Enter all fields";
		$error_message_2.="</span>";
	}else{
		$query_3=mysql_query("UPDATE  users SET  firstname =  '$fn', lastname =  '$ln', country =  '$c', gender =  '$g', address =  '$ad',About =  '$ab', place = '$pl' WHERE  username='$un'");
		$good_message_2 = '<span class="good">';
		$good_message_2.= 'Your Information have been updates';
		$good_message_2.= '</span><br/><br/>';
		
	}
}
?>
<?php
$good_message_3="";
$error_message_3="";
if(isset($_POST['upload_pic'])){
	if(isset($_FILES['profile_pic']['name'])){
		$_FILES['profile_pic'] = $_FILES['profile_pic'];
		if(($_FILES['profile_pic']["type"]=="image/jpeg")||($_FILES['profile_pic']["type"]=="image/png")||($_FILES['profile_pic']["type"]=="image/gif")){
			if(file_exists("users/$un/proimages".$_FILES['profile_pic']['name'])){
				$error_message_3 = '<span class="error">';
				$error_message_3.= 'Your file is the same';
				$error_message_3.= '</span><br/><br/>';
			}else{
				$temp = explode(".",$_FILES["profile_pic"]["name"]);
				$newfilename = rand(1,99999).".".end($temp);
				move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "users/$un/proimages/".$newfilename);
				unlink($row_pic['avatar']);
				$ex = mysql_query("UPDATE users SET avatar='users/$un/proimages/".$newfilename."' WHERE username='$un'");
				$good_message_3 = '<span class="good">Your file is uploaded</span><br/><br/>';
			}
		}else{
			$error_message_3 = '<span class="error">';
			$error_message_3.='Your file is not an image';
			$error_message_3.='</span><br/><br/>';
		}
	}
}
include 'inc/vars.inc.php';
$settings = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Edit your Account Settings below</h2>
<hr/>
<h3>Change your profile Image</h3>
<form action="account_settings.php" method="post" enctype="multipart/form-data">
<input type="file" name="profile_pic"/><br/>
<input type="submit" class="btn btn-default" name="upload_pic" value="Upload file"/><br/><br/>
<?php echo $error_message_3;echo $good_message_3; ?>
</form>
<hr/>
<p><h3>Change your password: </h3></p>
<form action="account_settings.php" method="POST">
<input type="password" class="form-control" placeholder="Old Password" name="op"/><br/>
<input type="password" class="form-control" placeholder="New Password" name="np"/><br/>
<input type="submit" name="cp" class="btn btn-default" value="Change Password" /><br/><br/>
<?php echo $error_message;echo $good_message; ?>
</form>
<hr/>
<p><h3>Update Profile Info </h3></p>
<form action="account_settings.php" method="post">
<input type="text" class="form-control" placeholder="First name" name="fn"/><br/>
<input type="text" placeholder="Last name" class="form-control" name="ln"/><br/>
<h4>Your Country: </h4><select class="select" id="countries" name="countries">
<?php include('country_template.php'); ?>
</select><br/>
<h4>Gender: </h4><select class="select" id="gender" name="gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select><br/><br/>
<input type="text" class="form-control"  placeholder="Work Or School" name="place"/><br/>
<textarea type="text" class="form-control" placeholder="Address(to have a new line click enter)"  name="add"></textarea><br/>
<textarea type="text" class="form-control" placeholder="About(to have a new line click enter)" name="about"></textarea><br/>
<input type="submit" name="ui" class="btn btn-default" value="Update Info" /><br/><br/>
<?php echo $error_message_2;echo $good_message_2; ?>
</form>
</div>
</div>
<?php include 'inc/footer.inc.php'; ?>