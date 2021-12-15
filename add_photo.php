<title>Add Photo</title>
<?php
$error_message_3 = "";
$good_message_3 = "";
include 'inc/header.inc.php';
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
include 'inc/vars.inc.php';
$photos_add = true;
include 'inc/aside.inc.php';
if(isset($_POST["sub"])){
    $name = $_POST['name'];
    $category = $_POST['category'];

   if(($_FILES['profile_pic']["type"]=="image/jpeg")||($_FILES['profile_pic']["type"]=="image/png")||($_FILES['profile_pic']["type"]=="image/gif")){
			
				$temp = explode(".",$_FILES["profile_pic"]["name"]);
				$newfilename = $name.".".end($temp);
                mkdir("users/$un/$name");
				move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "users/$un/$name/".$newfilename);
				$ex = mysql_query("INSERT INTO `photoes` VALUES ('', '$name', '$category', 'users/$un/$name/".$newfilename."','$un','".date("Y-m-d")."');");
				$good_message_3 = '<span class="good">Your file is uploaded</span><br/><br/>';
			
		}else{
			$error_message_3 = '<span class="error">';
			$error_message_3.='Your file is not an image';
			$error_message_3.='</span><br/><br/>';
		}
}
?>
<div class="col-md-9">
    <h2>Add a Photo</h2><hr>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" class="form-control" maxlength="25" placeholder="Name" required /><br/>
        <input type="text" name="category" class="form-control" maxlength="25"  placeholder="Category" required /><br/>
        <input type="file" name="profile_pic" required /><br/>
        <input type="submit" name="sub" class="btn btn-default" value="Add"/><br/><br/>
        <?php echo $error_message_3;echo $good_message_3; ?>
    </form>
</div>
</div>
<?php
    include 'inc/footer.inc.php';
?>