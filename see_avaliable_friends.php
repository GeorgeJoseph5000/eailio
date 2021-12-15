<title>Private Messanger</title>
<?php include 'inc/header.inc.php'; 
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
$messanger = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<div class="row">
<h2>See Available Friends</h2>
<hr/>
  <?php
	$id=1;
  	$message = '';
  	$friend_check = mysql_query("SELECT * FROM users WHERE username='$un'");
	$row = mysql_fetch_assoc($friend_check);
	$friends = $row['friends_array'];
	$explode = explode(",", $friends);
	$count = count($explode);
	
	if ($friends == "") {
		$count = count(NULL);
	}
	if($count == 0){
		$message = "<span class='error'>$un hasn't friends!</span>";
	}else{
		foreach (array_slice($explode,1) as $key => $value) {
			$row_pic = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$value'"));
			echo "
			<div class='col-md-3'>
				<div class='panel panel-default' style='width:200px;'>
				<div class='panel-heading'>
					<h4>
					<a href='otherprofile.php?u=$value'>
							$value
						</a>
						</h4>
						</div>
						<div style='text-align:center;' class='panel-body'>
						<h4>
						<a href='otherprofile.php?u=$value'>
							<img src='".$row_pic['avatar']."' width='50' height='50' /><br/>
						</a>
						
					</h4>
				<div id='status".$row_pic['id']."'>";
                                    echo '<script>setTimeout("see_available('.$row_pic['id'].');",100);</script>';
                                    echo "</div>
                                <div>
                                    <a href='private_messanger.php?userChat=$value' class='btn btn-primary'>Chat with $value!</a>
                                </div>
			</div></div>
			</div>";
			$id++;
			$user = $value;
		}
	}
  ?>
</div>
</div>
</div>
<?php include 'inc/footer.inc.php'; ?>
<script src="js/see_available.js"></script>