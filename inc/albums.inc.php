<?php
$arrayName = array('one','two' ,'three','four','five','six','seven','eight','nine','ten');
$d = date("Y-m-d");
$namePost1 = $_POST[$arrayName[0]];
$namePost2 = $_POST[$arrayName[1]];
$namePost3 = $_POST[$arrayName[2]];
$namePost4 = $_POST[$arrayName[3]];
$namePost5 = $_POST[$arrayName[4]];
$namePost6 = $_POST[$arrayName[5]];
$namePost7 = $_POST[$arrayName[6]];
$namePost8 = $_POST[$arrayName[7]];
$namePost9 = $_POST[$arrayName[8]];
$namePost10 = $_POST[$arrayName[9]];
$newfilename1 = "";
$newfilename2 = "";
$newfilename3 = "";
$newfilename4 = "";
$newfilename5 = "";
$newfilename6 = "";
$newfilename7 = "";
$newfilename8 = "";
$newfilename9 = "";
$newfilename10 = "";
if($_FILES[$arrayName[0]]["type"]=="image/jpeg"||$_FILES[$arrayName[0]]["type"]=="image/png"||$_FILES[$arrayName[0]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[0]]["name"]);
	$newfilename1 = $namePost1.".".end($temp);
	mkdir("users/$un/$nameOfAlbum");
	move_uploaded_file($_FILES[$arrayName[0]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename1);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}	
if($_FILES[$arrayName[1]]["type"]=="image/jpeg"||$_FILES[$arrayName[1]]["type"]=="image/png"||$_FILES[$arrayName[1]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[1]]["name"]);
	$newfilename2 = $namePost2.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[1]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename2);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[2]]["type"]=="image/jpeg"||$_FILES[$arrayName[2]]["type"]=="image/png"||$_FILES[$arrayName[2]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[2]]["name"]);
	$newfilename3 = $namePost3.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[2]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename3);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[3]]["type"]=="image/jpeg"||$_FILES[$arrayName[3]]["type"]=="image/png"||$_FILES[$arrayName[3]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[3]]["name"]);
	$newfilename4 = $namePost4.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[3]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename4);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[4]]["type"]=="image/jpeg"||$_FILES[$arrayName[4]]["type"]=="image/png"||$_FILES[$arrayName[4]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[4]]["name"]);
	$newfilename5 = $namePost5.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[4]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename5);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[5]]["type"]=="image/jpeg"||$_FILES[$arrayName[5]]["type"]=="image/png"||$_FILES[$arrayName[5]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[5]]["name"]);
	$newfilename6 = $namePost6.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[5]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename6);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[6]]["type"]=="image/jpeg"||$_FILES[$arrayName[6]]["type"]=="image/png"||$_FILES[$arrayName[6]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[6]]["name"]);
	$newfilename7 = $namePost7.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[6]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename7);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[7]]["type"]=="image/jpeg"||$_FILES[$arrayName[7]]["type"]=="image/png"||$_FILES[$arrayName[7]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[7]]["name"]);
	$newfilename8 = $namePost8.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[7]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename8);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[8]]["type"]=="image/jpeg"||$_FILES[$arrayName[8]]["type"]=="image/png"||$_FILES[$arrayName[8]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[8]]["name"]);
	$newfilename9 = $namePost9.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[8]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename9);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
if($_FILES[$arrayName[9]]["type"]=="image/jpeg"||$_FILES[$arrayName[9]]["type"]=="image/png"||$_FILES[$arrayName[9]]["type"]=="image/gif"){
	$temp = explode(".",$_FILES[$arrayName[9]]["name"]);
	$newfilename10 = $namePost10.".".end($temp);
	move_uploaded_file($_FILES[$arrayName[9]]["tmp_name"], "users/$un/$nameOfAlbum/".$newfilename10);
}else {
	$error_message = '<span class="error">Enter a valid image</span>';
}
?>