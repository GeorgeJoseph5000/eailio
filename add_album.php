<title>Add an Album</title>
<?php include 'inc/header.inc.php'; ?>
<?php
$error_message = '';
$good_message = '';
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
$albums_add = true;
include 'inc/aside.inc.php';
if(isset($_POST['submit'])){
	$nameOfAlbum = $_POST['nameofAlbum'];
	$category = $_POST['category'];
	//$querycheck = mysql_fetch_assoc(mysql_query("SELECT * FROM albums WHERE name = '$nameOfAlbum'"));
	//if($querycheck['name'] != ''){
		include 'inc/albums.inc.php';
		mysql_query("INSERT INTO `albums` (`id`, `name`, `user`, `date`, `category`, `one`, `one_name`, `two`, `two_name`, `three`, `three_name`, `four`, `four_name`, `five`, `five_name`, `six`, `six_name`, `seven`,`seven_name`,`eight`, `eight_name`, `nine`, `nine_name`, `ten`, `ten_name`) VALUES ('', '$nameOfAlbum', '$un', '$d', '$category','users/$un/$nameOfAlbum/$newfilename1', '$namePost1', 'users/$un/$nameOfAlbum/$newfilename2', '$namePost2', 'users/$un/$nameOfAlbum/$newfilename3', '$namePost3', 'users/$un/$nameOfAlbum/$newfilename4', '$namePost4', 'users/$un/$nameOfAlbum/$newfilename5', '$namePost5', 'users/$un/$nameOfAlbum/$newfilename6', '$namePost6', 'users/$un/$nameOfAlbum/$newfilename7', '$namePost7', 'users/$un/$nameOfAlbum/$newfilename8', '$namePost8', 'users/$un/$nameOfAlbum/$newfilename9', '$namePost9', 'users/$un/$nameOfAlbum/$newfilename10', '$namePost10');");
		$good_message = '<span class="good">Your Album is successfully uploaded!</span>';
	//}else{
	//	$error_message = '<span class="error">This album has been added</span>';
	//}

}
?>
<div class="col-md-9">
<h2>Add Album</h2><hr/>
<form method="POST" enctype="multipart/form-data" action="add_album.php">
	<input type="text" class="form-control" name="nameofAlbum" maxlength="25"  placeholder="Name of Album" required/><br/>
	<input type="text" name="category" class="form-control" maxlength="25" placeholder="Category" required/><br/>
	<input type="text" name="one" class="form-control" maxlength="25" placeholder="First Photo Name" required /><br/>
	<input type="file" name="one" required/><br/>
	<input type="text" name="two" maxlength="25" class="form-control" placeholder="Second Photo Name" required/><br/>
	<input type="file" name="two" required /><br/>
	<input type="text" name="three" maxlength="25"class="form-control" placeholder="Third Photo Name" required /><br/>
	<input type="file" name="three" required /><br/>
	<input type="text" name="four" maxlength="25"class="form-control" placeholder="Fourth Photo Name" required /><br/>
	<input type="file" name="four" required /><br/>
	<input type="text" name="five" maxlength="25"  class="form-control" placeholder="Fifth Photo Name" required/><br/>
	<input type="file" name="five" required /><br/>
	<input type="text" name="six" class="form-control" maxlength="25" placeholder="Sixth Photo Name" required /><br/>
	<input type="file" name="six" required /><br/>
	<input type="text" name="seven" class="form-control" maxlength="25"placeholder="Seventh Photo Name" required /><br/>
	<input type="file" name="seven" required /><br/>
	<input type="text" name="eight" class="form-control" maxlength="25" placeholder="Eight Photo Name" required /><br/>
	<input type="file" name="eight" required /><br/>
	<input type="text" name="nine" class="form-control" maxlength="25" placeholder="Nineth Photo Name" required /><br/>
	<input type="file" name="nine" required /><br/>
	<input type="text" name="ten" class="form-control" maxlength="25" placeholder="Tenth Photo Name" required /><br/>
	<input type="file" name="ten" required /><br/>
	<input type="submit" class="btn btn-default" name="submit" value="Add Album"/><br/><br/>
	<?php echo $error_message;echo $good_message; ?>
</form>
</div>
</div>
<?php include("inc/footer.inc.php"); ?>