<?php
session_start();
include ('../inc/connect.inc.php');
$id = $_POST ['id'];

$info = mysql_fetch_assoc(mysql_query("SELECT * FROM albums WHERE id = '".$id."'"));

$name = $info['name'];

$one = '../'.$info['one'];
$two = '../'.$info['two'];
$three = '../'.$info['three'];
$four = '../'.$info['four'];
$five = '../'.$info['five'];
$six = '../'.$info['six'];
$seven = "../".$info['seven'];
$eight = '../'.$info['eight'];
$nine = '../'.$info['nine'];
$ten = '../'.$info['ten'];

unlink($one);
unlink($eight);
unlink($two);
unlink($three);
unlink($four);
unlink($five);
unlink($six);
unlink($seven);
unlink($nine);
unlink($ten);
rmdir("../users/".$info['user']."/".$info['name']);

mysql_query("UPDATE posts SET album = 'none' WHERE added_by = '".$info['user']."' AND album = '".$name."'");

mysql_query ( "DELETE FROM albums WHERE id = '" . $id . "'" );


$id = 1;
$query = mysql_query ( "SELECT * FROM albums" );
while ( $row = mysql_fetch_array ( $query ) ) {
	?>
<div class="row">
	<div class="col-md-3">
		<div class='panel panel-default' style='width: 200px;'>
			<div class='panel-heading'>
				<h4>
					<a href='viewAlbum.php?id=<?php echo $row['id']; ?>'><?php echo $row['name']; ?></a>
				</h4>
			</div>
			<div class='panel-body'>
				<h4 style="color: #090;">Category:</h4>
				<h4 style="color: #C00;"><?php echo $row['category']; ?></h4>
				<h4 style="color: #090;">Created By:</h4>
				<h4 style="color: #C00;"><?php echo $row['user']; ?></h4>
				<h4 style="color: #090;">Date Created:</h4>
				<h4 style="color: #C00;"><?php echo $row['date']; ?></h4>

				<button
					onclick="javascript: delete_album('<?php echo $row['id']; ?>')"
					class="btn btn-primary">Delete</button>
			</div>
		</div>
	</div>
</div>
<?php
	$id ++;
}

?>
<br />
<span class="good">Album <?php echo $name;?> is deleted</span>