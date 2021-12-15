<?php 
include '../inc/connect.inc.php';
$user = $_POST['un'];
$un = $_POST['username'];
$add_friend_check = mysql_query("SELECT * FROM users WHERE username='$un'");
$get_row = mysql_fetch_assoc($add_friend_check);
$get_friends = $get_row['friends_array'];
$add_friend_check_from = mysql_query("SELECT * FROM users WHERE username='$user'");
$get_row_from = mysql_fetch_assoc($add_friend_check_from);
$get_friends_from = $get_row_from['friends_array'];
$userComma = ','.$user;
$unComma = ','.$un;
$friend1 = str_replace("$userComma", "", $get_friends);
$friend2 = str_replace("$unComma", "", $get_friends_from);
$remove1 = mysql_query("UPDATE users SET friends_array='$friend1' WHERE username='$un'");
$remove2 = mysql_query("UPDATE users SET friends_array='$friend2' WHERE username='$user'");
echo '<span class="good">You unfriended user '.$un.'!</span><br/><br/>';
?>