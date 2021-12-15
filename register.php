<?php  
include_once("inc/header.inc.php");
$error_message = "";
$good_message = "";
$errors = array();
$reg = strip_tags(@$_POST['reg']);
$un2 = str_replace(' ', '', strip_tags(@$_POST['username']));
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$em = strip_tags(@$_POST['email']);
$ps = strip_tags(@$_POST['password']);
$pl = strip_tags(@$_POST['place']);
$gender = strip_tags(@$_POST['gender']);
$countries = strip_tags(@$_POST['countries']);

$d = date("Y-m-d");
if(isset($reg)){

	if($un2 == "" || $fn == "" || $ln == "" || $em == "" || $ps == "" || $pl == ""){
		$errors[] = "You have to enter all form fields";
	} else {
		$query = "SELECT * FROM users WHERE username='$un2' OR email='$em'";
		$query_ex = mysql_query($query);
		$query_nr = mysql_num_rows($query_ex);
		if($query_nr == 0){
		if (strlen($un2) < 25 && strlen($un2) > 3) {
		if (strlen($fn) < 25 && strlen($fn) > 3) {
		if (strlen($ln) < 25 && strlen($ln) > 3) {
		if (strlen($em) < 88 && strlen($em) > 3) {
		if (strlen($ps) < 25 && strlen($ps) > 3) {
			$query_2 = mysql_query("INSERT INTO users VALUES ('','$fn','$ln','$un2','$em','$ps','$d','1', '$countries', '$gender', 'I did not write my address.', 'I did not write my about paragraph.','images/default_pic.jpg','','nor','false','$pl')");
			if (!$query_2) {
				die(mysql_error());
			}else{
				mkdir("users/$un2");
				mkdir("users/$un2/proimages");
				$header = "MIME-Version: 1.0\r\n"; 
				$header .= "Content-type: text/html\r\n";
				mail($em,"Activation Confirmation",'To Activate Your Account <a href="http://eailio.freeoda.com/Eailio/activate.php?u='.$un2.'">Click here</a>',$header);
				$error_message = '<span class="good">';
				$error_message.='You are registered. Login now!</a>';
				$error_message.='</span>';
			}
		}else{
			$errors[] = "Password length should be between 3 and 25 characters";
		}
		}else{
			$errors[] = "Email length should be between 3 and 88 characters";
		}
		}else{
			$errors[] = "Last name length should be between 3 and 25 characters";
		}
		}else{
			$errors[] = "First name length should be between 3 and 25 characters";
		}
		}else{
			$errors[] = "Username length should be between 3 and 25 characters";
		}
		}else{
			$errors[] = "Username or email is already registered";
		}
	}
	if(!empty($errors)){
			$error_message = '<span class="error">';
				foreach ($errors as $key => $values) {
					$error_message.="$values";
				}
			$error_message.='</span>';
		}
	}

 ?>
<title>Register</title>
<div class="row">
	<div class="col-md-4">
<h2>Registeration Form</h2>
<hr/>
<form method="POST">
	<input type="text" name="username" class="form-control" placeholder="Username"/><br />
	<input type="text" name="fname" class="form-control" placeholder="First name"  /><br />
	<input type="text" name="lname"  class="form-control" placeholder="Last name" /><br />
	<input type="text" name="email" class="form-control" placeholder="Email"  /><br/>
	<input type="text" name="place" class="form-control" placeholder="Work Or School"  />
	<h4>Gender:</h4><select class="select" id="gender" name="gender"><option value="Male">Male</option><option value="Female">Female</option></select><br/>
	<h4>Your Country:</h4><select class="select" id="countries" name="countries"><?php include('country_template.php'); ?></select><br/><br/>
	<input type="password" name="password" class="form-control" placeholder="Password" /><br />
	<input type="submit" name="reg" class="btn btn-default" value="Register" /><br /><br />
	<?php if(isset($_POST['reg'])){echo $error_message;echo $good_message;} ?>
</form>
	</div>
	<div class="col-md-8"><img src="https://www.incimages.com/uploaded_files/image/1920x1080/getty_1173146314_417254.jpg" style="width: 100%;"/></div>
	
</div>
<?php  include_once("./inc/footer.inc.php"); ?>