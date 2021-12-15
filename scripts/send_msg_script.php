<?php
include '../inc/connect.inc.php';
$body = $_POST ['body'];
$username = $_POST ['username'];
$un = $_POST ['un'];
$subject = $_POST ['subject'];
$date = date ( "Y-m-d" );
$album = $_POST['album'];
$photo = $_POST['photo'];
if ($body != '' || $subject != '') {
	$insert = mysql_query ( "INSERT INTO messages VALUES('','$subject','$un','$username','$body','$date','no','no','$album','$photo')" );
	echo "<span class='good'>Your message have been sent.</span>";
} else {
	echo "<span class='error'>Enter all fields.</span>";
}
?>