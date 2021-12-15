<?php
include '../inc/connect.inc.php';
$user_to = $_POST['to'];
$see_availabile = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '$user_to'"));
if($see_availabile['avalabile'] == "true"){
    echo '<h4 style="display:inline-block;">Status: </h4><p style="display:inline-block;font-weight: normal;">Avaliable</p>';
}else if($see_availabile['avalabile'] == "false"){
    echo '<h4 style="display:inline-block;">Status: </h4><p style="display:inline-block;font-weight: normal;">Unavaliable</p>';
}
//comcmcmcmcm
//comcmcmcmcm
//comcmcmcmcm
//comcmcmcmcm

?>