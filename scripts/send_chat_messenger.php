<?php
    include '../inc/connect.inc.php';
    $nickname = $_POST['name'];
    $msg = $_POST['msg'];
    $user_send = $_POST['send'];
    $user_to = $_POST['to'];
    $query = mysql_query("INSERT INTO chats VALUES('','$nickname','$user_send','$user_to','$msg','$user_send to $user_to')");
    include 'load_chat.php';
    //send chat
    //send chat
    //send chat
    //send chat
    //send chat
    //send chat
    //send chat
    //send chat
    //send chat
    
    
?>