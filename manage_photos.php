<title>Manage Photoes</title>
<?php include 'inc/header.inc.php'; ?>
<script>
function addPhotoes(){
    window.location = "add_photo.php";
}
</script>
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
$photos = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
<h2>Manage Photoes</h2><hr/>
<div class="row">
<?php
		$id = 1;
		$query = mysql_query("SELECT * FROM photoes WHERE user='$un'");
		while($row = mysql_fetch_assoc($query)){
		?>
			<div class="col-md-3">
			<div class='panel panel-default' style='width:200px;'>
                <div class='panel-heading'>
				<h4><a href='viewPhotoes.php?id=<?php echo $row['id']; ?>' ><?php echo $row['name']; ?></a></h4>
  	    	    </div>
				<div class='panel-body'>
  	    	    <h4 style="color:#090;">User Added: </h4><h4 style="color:#C00;"><?php if($row['user'] == $un){echo "Me";}else{echo $row['user'];} ?></h4>
	  	    	<h4 style="color:#090;">Date: </h4><h4 style="color:#C00;"><?php echo $row['date']; ?></h4>
                <h4 style="color:#090;">Category: </h4><h4 style="color:#C00;"><?php echo $row['category']; ?></h4>
                </div>
            </div>
			</div>
		<?php
			$id++;
		}
	?>
	</div>
    <br/>
    <input type="submit" class="btn btn-primary" onclick="addPhotoes()" value="Add A Photo!!!" />
    </div>
    </div>
<?php include("inc/footer.inc.php"); ?>