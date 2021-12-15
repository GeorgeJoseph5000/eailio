<title>TryIt</title>
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
include 'inc/vars.inc.php';
$tryit = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Try HTML Programing</h2>
<hr/>
<div class="row">
    <div class="col-md-4">
        <textarea style="width:100%;height:300px;margin-top: 5px;" placeholder="Write here.........." id="ed" class="form-control img-responsive" ></textarea>
    </div>
    <div class="col-md-4">
        <div id="show" style="width:100%;height:300px;overflow-y:scroll;margin-top: 5px;" class="form-control img-responsive" ></div>
    </div>
</div>
</div>
</div>
<?php include 'inc/footer.inc.php'; ?>
<script src="js/tryIt.js"></script>