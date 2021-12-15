<?php
include '../inc/connect.inc.php';
$user_to = $_POST['id'];
$see_availabile = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '$user_to'"));
if($see_availabile['avalabile'] == "true"){
    echo '<h4>Avaliable</h4>';
}else if($see_availabile['avalabile'] == "false"){
    echo '<h4>Unavaliable</h4>';
}
?>