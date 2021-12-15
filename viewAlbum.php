<title>Album View</title>
<?php include 'inc/header.inc.php'; ?>
<script>
function addAlbums(){
    window.location = "add_album.php";
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

?>
    <?php
        $id = $_GET["id"];
        $seeId = mysql_fetch_assoc(mysql_query("SELECT * FROM albums WHERE id='$id'"));
        if($seeId['name'] == ''){
            echo '<script>window.location = "index.php";</script>';
        }
        if ($seeId['user'] == $un) {
            echo '<h2>'.$seeId['name'].' <span class="glyphicon glyphicon-hand-right"></span> '.$seeId['category'].' <b style="font-size:15px;">Created by</b> <a style="font-size:15px;" href="otherprofile.php?u='.$seeId['user'].'">You</a><b style="font-size:15px;float:right;">'.$seeId['date'].'<br><form method="post"><input name="del" type="submit" class="btn btn-primary" value="Delete"/></form></b></h2><hr/>';
        }else{
            echo '<h2>'.$seeId['name'].' <span class="glyphicon glyphicon-hand-right"></span> '.$seeId['category'].' <b style="font-size:15px;">Created by</b> <a style="font-size:15px;" href="otherprofile.php?u='.$seeId['user'].'">'.$seeId['user'].'</a><b style="font-size:15px;float:right;">'.$seeId['date'].'<br></b></h2><hr/>';
        }
        if (isset($_POST['del'])) {
            $sql = mysql_query("DELETE FROM albums WHERE id='$id'");
            unlink($seeId['one']);
            unlink($seeId['two']);
            unlink($seeId['three']);
            unlink($seeId['four']);
            unlink($seeId['five']);
            unlink($seeId['six']);
            unlink($seeId['seven']);
            unlink($seeId['eight']);
            unlink($seeId['nine']);
            unlink($seeId['ten']);
            rmdir("users/$un/".$seeId['name']);
            mysql_query("UPDATE posts SET album = 'none' WHERE added_by = '".$seeId['user']."' AND album = '".$seeId['name']."'");
            $query = mysql_query("UPDATE posts SET album = 'none' WHERE added_by = '$un' AND album = '".$seeId['name']."'");
            echo '<script>window.location = "home.php";alert("The album is deleted.");</script>';
        }
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['one_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['one']; ?>" data-toggle="modal" data-target="#one"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['two_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['two']; ?>" data-toggle="modal" data-target="#two"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['three_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['three']; ?>" data-toggle="modal" data-target="#three"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['four_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['four']; ?>" data-toggle="modal" data-target="#four"  />
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['five_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['five']; ?>" data-toggle="modal" data-target="#five"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['six_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['six']; ?>" data-toggle="modal" data-target="#six"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['seven_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['seven']; ?>" data-toggle="modal" data-target="#seven"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['eight_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['eight']; ?>" data-toggle="modal" data-target="#eight"  />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['nine_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['nine']; ?>" data-toggle="modal" data-target="#nine"  />
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="width:250px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $seeId['ten_name']; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <img width="220" height="199" src="<?php echo $seeId['ten']; ?>" data-toggle="modal" data-target="#ten" />
                </div>
            </div>
        </div>
    </div>
    
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



<?php include 'inc/footer.inc.php'; ?>