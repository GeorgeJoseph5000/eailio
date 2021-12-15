<?php
    include '../inc/connect.inc.php';
    $username = $_POST['id'];

    $del = mysql_query("DELETE FROM posts WHERE id = '$username'");
	$del2 = mysql_query("DELETE FROM comments WHERE post_id = '$username'");
	
    $id = 1;
    ?>
    
<div class="row">
	<?php
		$id = 1;
		$query = mysql_query("SELECT * FROM posts");
		while($row = mysql_fetch_assoc($query)){
$aquery = mysql_fetch_assoc(mysql_query("SELECT id FROM albums WHERE name = '".$row['album']."'"));
	$aquery2 = mysql_fetch_assoc(mysql_query("SELECT id FROM photoes WHERE name = '".$row['photo']."'"));
                ?>
                
			<div class="col-md-3">
			<div class='panel panel-default' style='width:200px;'>
			<div class='panel-heading'>
                <h4><a href="viewpost.php?id=<?php echo $row['id']; ?>">Post No. <?php echo $id; ?></a></h4>
			</div>
                <div class='panel-body'>
  	    	    <h4 style="color:#090;">User Added: </h4><h4 style="color:#C00;"><a href='otherprofile.php?u=<?php echo $row['added_by']; ?>'><?php echo $row['added_by']; ?></a></a></h4>
	  	    	<h4 style="color:#090;">Date: </h4><h4 style="color:#C00"><?php echo $row['date_added']; ?></a></h4>
				<h4 style="color:#090;">Likes: </h4><h4 style="color:#C00;"><?php echo $row['likes']; ?></h4>
                <h4 style="color:#090;">Album: </h4><h4 style="color:#C00;"><?php if($row['album'] == "none"){echo $row['album'];}else{echo "<a href='viewAlbum.php?id=".$aquery['id']."'>".$row['album']."</a>";} ?></h4>
				<h4 style="color:#090;">Photo: </h4><h4 style="color:#C00;"><?php if($row['photo'] == "none"){echo $row['photo'];}else{echo "<a href='viewPhotoes.php?id=".$aquery2['id']."'>".$row['photo']."</a>";} ?></h4>
                <button style="margin-top: 5px;" onclick="javascript: delete_post('<?php echo $row['id']; ?>')" class="btn btn-primary">Delete</button>
				</div>
				
              </div>
			  </div>
		<?php
			$id++;
                
		}
	?>
</div><br><br>
<span class="good">The post is deleted.</span>