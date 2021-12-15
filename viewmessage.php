<title>Viewing Message</title>
<?php
include 'inc/header.inc.php';
if (! isset ( $_SESSION ['user_login'] )) {
	echo '<p class="error">You should Log in</p>';
	include ('inc/footer.inc.php');
	exit ();
} else {
	$check2 = mysql_query ( "SELECT activated FROM users WHERE username='$un'" );
	$ac_row = mysql_fetch_assoc ( $check2 );
	if (! $ac_row ['activated'] == 1) {
		echo '<p class="error">This account is not activated.</p>';
		include_once 'inc/footer.inc.php';
		exit ();
	}
	if (! isset ( $_GET ['id'] )) {
		header ( 'Location: index.php' );
		exit ();
	} else {
		$query = mysql_query ( "SELECT * FROM messages WHERE id='" . $_GET ['id'] . "'" );
		if (mysql_num_rows ( $query ) == 1) {
			$id = $_GET ['id'];
		} else {
			header ( 'Location: index.php' );
			exit ();
		}
	}
}
?>
<?php

$query = mysql_query ( "SELECT * FROM messages WHERE id='$id'" );
$row = mysql_fetch_assoc ( $query );
$to = $row ['user_to'];
$opened = $row ['opened'];
$query2 = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='$un'" ) );
if ($query2 ['user_pos'] != "admin" || $query2 ['user_pos'] != "mod") {
}
if ($opened == "no") {
	if ($to == $un) {
		$otherquery = mysql_query ( "UPDATE messages SET opened='yes' WHERE id='$id'" );
	}
}
$subject = $row ['subject'];
$body = $row ['msg_body'];
$date = $row ['date'];
$from = $row ['user_from'];
$album = $row ['album'];
$photo = $row ['photo'];
include 'inc/vars.inc.php';
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
	<div>
		<h4>From:</h4><?php echo '<a href="otherprofile.php?u='.$from.'">'.$from.'</a>'; ?>
	<br /> <br />
		<h4>To:</h4><?php echo '<a href="otherprofile.php?u='.$to.'">'.$to.'</a>'; ?>
	<br /> <br />
		<h4>Subject:</h4>
		<h5><?php echo $subject; ?></h5>
		<br />
		<h4>Date:</h4>
		<h5><?php echo $date; ?></h5>
		<br />
		<h4>Message's Body</h4>
		<hr style="background-color: #06F; height: 1px;" />
		<h5 style="white-space: pre-line;"><?php echo $body; $seeId = mysql_fetch_assoc(mysql_query("SELECT * FROM albums WHERE user = '".$from."' AND name='$album'"));?></h5>
		<hr style="background-color: #06F; height: 1px;" />
		<br />
		<?php if ($album != "none" || $album != "none") {?>
		<h4>Albums and Photoes</h4>
		<hr style="background-color: #06F; height: 1px;" />
		<?php } if($album != 'none'){ ?><div class="modal fade" id="ten"
			tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['ten_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['ten']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="nine" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['nine_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['nine']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="eight" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['eight_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['eight']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="seven" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['seven_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['seven']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="six" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['six_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['six']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="five" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['five_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['five']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="four" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['four_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['four']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="three" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['three_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['three']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="two" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['two_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['two']; ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="one" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['one_name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['one']; ?>" />
					</div>
				</div>
			</div>
		</div>
			<?php
			echo '
				<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['one_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['one'] . '" data-toggle="modal" data-target="#one"  />
						</div>
					</div>
				</div>
				<div id="plus' . $id . '" onclick="show_al(' . $id . ')" style="border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					+
				</div>
				<div class="col-md-3" style="display:none;" id="two' . $id . '">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['two_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['two'] . '" data-toggle="modal" data-target="#two"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="three' . $id . '">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['three_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['three'] . '" data-toggle="modal" data-target="#three"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="four' . $id . '">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['four_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['four'] . '" data-toggle="modal" data-target="#four"  />
						</div>
					</div>
				</div>
			</div>    
			<div class="row" style="display:none;" id="fivesixseveneight' . $id . '">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['five_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['five'] . '" data-toggle="modal" data-target="#five"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['six_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['six'] . '" data-toggle="modal" data-target="#six"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['seven_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['seven'] . '" data-toggle="modal" data-target="#seven"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['eight_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['eight'] . '" data-toggle="modal" data-target="#eight"  />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" style="display:none;" id="nine' . $id . '">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['nine_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['nine'] . '" data-toggle="modal" data-target="#nine"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="ten' . $id . '">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								' . $seeId ['ten_name'] . '
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="' . $seeId ['ten'] . '" data-toggle="modal" data-target="#ten" />
						</div>
					</div>
				</div>
				<div id="minus' . $id . '" onclick="hide_al(' . $id . ')" style="display:none;border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					-
				</div></div>';
		}
		if ($photo != 'none') {
			$seeId = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM photoes WHERE user = '" . $from . "' AND name='$photo'" ) );
			?>
				<div class="modal fade" id="photo<?php echo $id ?>" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['name']; ?>
							</h4>
					</div>
					<div style="text-align: center;" class="modal-body">
						<img class="img-responsive" src="<?php echo $seeId['url']; ?>" />
					</div>
				</div>
			</div>
		</div><?php
			
			echo '<div class="panel panel-default" style="width:220px;">
					<div class="panel-heading">
						<h3 class="panel-title">
							' . $seeId ["name"] . '
						</h3>
					</div>		
					<div class="panel-body">
						<img width="170" height="120" src="' . $seeId ['url'] . '" data-toggle="modal" data-target="#photo' . $id . '"  />
					</div>
				</div>';
		}
		if ($album != "none" || $album != "none") {
			?>
		<hr style="background-color: #06F; height: 1px;" />
		<?php }?>
		<br />
    <?php
				if (isset ( $_POST ['delete'] )) {
					if ($row ['trash'] == "no") {
						$deletemsg = mysql_query ( "UPDATE messages SET trash='yes' WHERE id='$id'" );
						echo '<script> window.location="inbox.php"; </script> ';
					} else {
						$deletemsg = mysql_query ( "DELETE FROM messages WHERE id='$id'" );
						echo '<script> window.location="inbox.php"; </script> ';
					}
				}
				if (isset ( $_POST ['restore'] )) {
					$deletemsg = mysql_query ( "UPDATE messages SET trash='no' WHERE id='$id'" );
					echo '<script> window.location="inbox.php"; </script> ';
				}
				?>
    <form method="post">
		<?php
		if ($to == $un) {
			echo '<input name="delete" class="btn btn-primary" value="Delete Message" type="submit" />';
			
			$row = mysql_fetch_assoc ( mysql_query ( "SELECT trash FROM messages WHERE id='$id'" ) );
			if ($row ['trash'] == "yes" && $from != $un) {
				echo '&nbsp;&nbsp;&nbsp;
				<input name="restore" class="btn btn-primary" value="Restore Message" type="submit" />';
			}
			if ($from != $un) {
				echo '&nbsp;&nbsp;&nbsp;
				<a href="reply_msg.php?u=' . $from . '&id=' . $id . '" class="btn btn-primary">Reply</a>';
			}
		}
		?>
    </form>
	</div>

</div>
</div>
<script type="text/javascript">
function show_al (id){
	$("#plus"+id).hide();
	$("#two"+id).show();
	$("#three"+id).show();
	$("#four"+id).show();
	$("#fivesixseveneight"+id).show();
	$("#nine"+id).show();
	$("#ten"+id).show();
	$("#minus"+id).show();

}
function hide_al (id){
	$("#plus"+id).show();
	$("#two"+id).hide();
	$("#three"+id).hide();
	$("#four"+id).hide();
	$("#fivesixseveneight"+id).hide();
	$("#nine"+id).hide();
	$("#ten"+id).hide();
	$("#minus"+id).hide();

}
</script>
<?php include('inc/footer.inc.php'); ?>

