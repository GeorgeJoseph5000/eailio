<?php
 include_once("inc/header.inc.php");
 ?>
<title>Eailio</title>
<div style="width: 100%;background-image: url(https://www.eliassonmarketing.com/wp-content/uploads/2021/04/social-media-opportunities-601bc9d146e00.png);background-position: center; padding-bottom: 700px;" alt="">

<div class="row">
	<div class="col-md-12">
		<h1 style="width: 100%;text-align: center;color:white;">BEAT Boredom and Start connecting with people on Eailio</h1>
	</div>

<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-3">
        <a href="register.php" style="text-shadow: black;box-shadow: black;font-size: 30px;margin-bottom:50px;" class="btn btn-danger">Register Now</a>
        <br>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-3">
        <a href="login.php" style="text-shadow: black;box-shadow: black;font-size: 30px;" class="btn btn-warning">Login Now</a>
        <br>
    </div>
    <div class="col-md-2">
    </div>
</div>
	
</div>
</div>

		<?php
        	if (isset($_SESSION['user_login'])) {
				echo'<script> window.location="home.php"; </script> ';
			}
		?>

<?php  include_once("./inc/footer.inc.php"); ?>
