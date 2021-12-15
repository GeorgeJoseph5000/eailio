<?php
$strQueryPosts = "SELECT * FROM posts WHERE added_by = '".$un."' ";
$add_friend_check = mysql_query("SELECT * FROM users WHERE username='$un' ");
$get_row = mysql_fetch_assoc($add_friend_check);
$get_friends = $get_row['friends_array'];
$get_explode = explode(",", $get_friends);
foreach (array_slice($get_explode,1) as $key => $value) {
	$strQueryPosts .= "OR added_by = '".$value."' ";
}
$strQueryPosts .= "ORDER BY `id` DESC";
$query = mysql_query($strQueryPosts);
while($row = mysql_fetch_array($query)){
	$id = $row['id'];
	$body = $row['body'];
	$album = $row['album'];
	$photo = $row['photo'];
	$date_added = $row['date_added'];
	$added_by = $row['added_by'];
	$row_pic1 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username='$added_by' "));
	$iflikemade = mysql_fetch_assoc(mysql_query("SELECT * FROM likes WHERE post_id='$id' AND user_like='$un'"));
	$seePostId = mysql_fetch_assoc(mysql_query("SELECT * FROM posts WHERE id='$id'"));
	if ($album != 'none' && $photo == 'none') {
		$seeId = mysql_fetch_assoc(mysql_query("SELECT * FROM albums WHERE user = '".$added_by."' AND name='$album'"));
		$likes = $seePostId['likes'];
		if($iflikemade['user_like'] == ''){
			?>
			<div class="modal fade" id="ten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['ten_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['ten']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="nine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['nine_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['nine']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="eight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['eight_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['eight']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="seven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['seven_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['seven']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="six" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['six_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['six']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="five" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['five_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['five']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="four" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['four_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['four']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="three" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['three_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['three']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="two" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['two_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['two']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['one_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['one']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<?php
			echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'
				<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['one_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['one'].'" data-toggle="modal" data-target="#one"  />
						</div>
					</div>
				</div>
				<div id="plus'.$id.'" onclick="show_al('.$id.')" style="border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					+
				</div>
				<div class="col-md-3" style="display:none;" id="two'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['two_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['two'].'" data-toggle="modal" data-target="#two"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="three'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['three_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['three'].'" data-toggle="modal" data-target="#three"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="four'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['four_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['four'].'" data-toggle="modal" data-target="#four"  />
						</div>
					</div>
				</div>
			</div>    
			<div class="row" style="display:none;" id="fivesixseveneight'.$id.'">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['five_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['five'].'" data-toggle="modal" data-target="#five"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['six_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['six'].'" data-toggle="modal" data-target="#six"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['seven_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['seven'].'" data-toggle="modal" data-target="#seven"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['eight_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['eight'].'" data-toggle="modal" data-target="#eight"  />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" style="display:none;" id="nine'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['nine_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['nine'].'" data-toggle="modal" data-target="#nine"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="ten'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['ten_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['ten'].'" data-toggle="modal" data-target="#ten" />
						</div>
					</div>
				</div>
				<div id="minus'.$id.'" onclick="hide_al('.$id.')" style="display:none;border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					-
				</div>
			</div></p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: send_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-up"></span> Like
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';
		}else{
			?>
			<div class="modal fade" id="ten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['ten_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['ten']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="nine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['nine_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['nine']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="eight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['eight_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['eight']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="seven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['seven_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['seven']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="six" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['six_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['six']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="five" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['five_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['five']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="four" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['four_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['four']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="three" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['three_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['three']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="two" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['two_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['two']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['one_name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['one']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<?php
			echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'
				<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['one_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['one'].'" data-toggle="modal" data-target="#one"  />
						</div>
					</div>
				</div>
				<div id="plus'.$id.'" onclick="show_al('.$id.')" style="border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					+
				</div>
				<div class="col-md-3" style="display:none;" id="two'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['two_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['two'].'" data-toggle="modal" data-target="#two"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="three'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['three_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['three'].'" data-toggle="modal" data-target="#three"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="four'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['four_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['four'].'" data-toggle="modal" data-target="#four"  />
						</div>
					</div>
				</div>
			</div>    
			<div class="row" style="display:none;" id="fivesixseveneight'.$id.'">
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['five_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['five'].'" data-toggle="modal" data-target="#five"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['six_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['six'].'" data-toggle="modal" data-target="#six"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['seven_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['seven'].'" data-toggle="modal" data-target="#seven"  />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['eight_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['eight'].'" data-toggle="modal" data-target="#eight"  />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" style="display:none;" id="nine'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['nine_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['nine'].'" data-toggle="modal" data-target="#nine"  />
						</div>
					</div>
				</div>
				<div class="col-md-3" style="display:none;" id="ten'.$id.'">
					<div class="panel panel-default" style="width:220px;height:200px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId['ten_name'].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['ten'].'" data-toggle="modal" data-target="#ten" />
						</div>
					</div>
				</div>
				<div id="minus'.$id.'" onclick="hide_al('.$id.')" style="display:none;border-radius:5px;margin-left:30px;background-color:black;color:white;font-size:150px;width:180px;height:200px;text-align:center;user-select: none;-moz-user-select: none;-webkit-user-select: none; cursor:pointer;" class="col-md-3">
					-
				</div>
			</div></p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: delete_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-down"></span> Unlike
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';
		}
	}else if ($photo != 'none' && $album == "none"){
		$seeId = mysql_fetch_assoc(mysql_query("SELECT * FROM photoes WHERE user = '".$added_by."' AND name='$photo'"));
		$likes = $seePostId['likes'];
		if($iflikemade['user_like'] == ''){
			?>
			<div class="modal fade" id="photo<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['url']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<?php
			echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'
				<div class="panel panel-default" style="width:220px;">
					<div class="panel-heading">
						<h3 class="panel-title">
							'.$seeId["name"].'
						</h3>
					</div>		
					<div class="panel-body">
						<img width="170" height="120" src="'.$seeId['url'].'" data-toggle="modal" data-target="#photo'.$id.'"  />
					</div>
				</div>
				</p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: send_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-up"></span> Like
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';
		}else{
			?>
			<div class="modal fade" id="photo<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">
								<?php echo $seeId['name']; ?>
							</h4>
						</div>
						<div style="text-align:center;" class="modal-body">
							<img class="img-responsive" src="<?php echo $seeId['url']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<?php
			echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'
					<div class="panel panel-default" style="width:220px;">
						<div class="panel-heading">
							<h3 class="panel-title">
								'.$seeId["name"].'
							</h3>
						</div>
						<div class="panel-body">
							<img width="170" height="120" src="'.$seeId['url'].'" data-toggle="modal" data-target="#photo'.$id.'"  />
						</div>
					</div>
				</p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: delete_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-down"></span> Unlike
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';	
		}
	}else if($album == 'none' && $photo == 'none'){
		$likes = $seePostId['likes'];
		if($iflikemade['user_like'] == ''){
			echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'</p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: send_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-up"></span> Like
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';
		}else{
		  echo '<a href="otherprofile.php?u='.$added_by.'">
					<img width="40" height="40" src="'.$row_pic1['avatar'].'" />
				</a>
				&nbsp;&nbsp;
				<a href="otherprofile.php?u='.$added_by.'">'.$added_by.'</a>
				<b style="float:right;">'.$date_added.'</b>
				<p style="white-space:pre-line;">'.$body.'</p>
				<a href="#" data-toggle="modal" data-target="#comments'.$id.'">Comment</a>
				&nbsp;&nbsp;
				<div id="like_show'.$id.'" style="display:inline;">
					<a href="#" onclick="javascript: delete_like('.$id.')">
						<span class="glyphicon glyphicon-thumbs-down"></span> Unlike
					</a>
					<p style="float:right;display:inline;"><b>No. of Likes: </b>'.$likes.'</p>
				</div>
				<hr style="background-color: #06F; height: 1px;"/>';
				
		}
	}
					
echo '<div class="modal fade" id="comments'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">
						Comments
					</h4>
				</div>
				<div class="modal-body">
					<div id="postForm">
						<iframe style="width:100%;height:100%;" seamless="seamless" src="comments.php?id='.$id.'"></iframe>
					</div>
				</div>
			</div>
		</div>
	  </div>';
?>
<?php
}
?>
