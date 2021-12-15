<title>Album View</title>
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
?>
    <?php
        $id = $_GET["id"];
        $seeId = mysql_fetch_assoc(mysql_query("SELECT * FROM photoes WHERE id='$id'"));
        if($seeId['name'] == ''){
            echo '<script>window.location = "index.php";</script>';
        }
        if ($seeId['user'] == $un) {
            echo '<h2>'.$seeId['name'].' <span class="glyphicon glyphicon-hand-right"></span> '.$seeId['category'].' <b style="font-size:15px;">Created by</b> <a style="font-size:15px;" href="otherprofile.php?u='.$seeId['user'].'">You</a><b style="font-size:15px;;float:right;">'.$seeId['date'].'<br><form method="post"><input name="del" type="submit" class="btn btn-primary" value="Delete"/></form></b></h2><hr/>';
        }else{
            echo '<h2>'.$seeId['name'].' <span class="glyphicon glyphicon-hand-right"></span> '.$seeId['category'].' <b style="font-size:15px;">Created by</b> <a style="font-size:15px;" href="otherprofile.php?u='.$seeId['user'].'">'.$seeId['user'].'</a><b style="font-size:15px;;float:right;">'.$seeId['date'].'<br><form method="post"><input name="del" type="submit" class="btn btn-primary" value="Delete"/></form></b></h2><hr/>';
        }
        if (isset($_POST['del'])) {
            $sql = mysql_query("DELETE FROM albums WHERE id='$id'");
            unlink($seeId['url']);
            rmdir("users/$un/".$seeId['name']);
            $query = mysql_query("UPDATE posts SET photo = 'none' WHERE added_by = '$un' AND photo = '".$seeId['name']."'");
            echo '<script>alert("The photo is deleted.");window.location = "home.php";</script>';
        }
    ?>
    <div class="panel panel-default" style="width:250px;">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo $seeId['name']; ?>
            </h3>
            </div>
            <div class="panel-body">
                <img width="220" height="199" src="<?php echo $seeId['url']; ?>" data-toggle="modal" data-target="#one"  />
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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