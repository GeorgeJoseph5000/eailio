<?php
include '../inc/connect.inc.php';
$user_to = $_POST['username'];
$user_from = $_POST['un'];
$ex_f = mysql_query("INSERT INTO friends_requests VALUES ('','$user_from','$user_to')");
echo '<span class="good">Your friend request have been sent.</span><br/><br/>';
?>
