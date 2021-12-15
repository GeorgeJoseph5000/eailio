<?php
include '../inc/connect.inc.php';
$user_send = $_POST['send'];
$user_to = $_POST['to'];
$thesee = mysql_query("SELECT * FROM chats WHERE code = '".$user_send." to ".$user_to."' OR code = '".$user_to." to ".$user_send."'");
while($row = mysql_fetch_array($thesee)){
    if($row['user_by'] == $user_send){
        echo '<div class="chat-me"><hello style="color:white;text-shadow: 5px 1px 5px rgba(0, 0, 0, 0.3);">'.$row['nickname'].":</hello><br/>".$row['msg'].'</div>';
        echo "<br/><br/><br/><br/>";
    }else{
        echo '<div class="chat-other"><hello style="color:white;text-shadow: 5px 1px 5px rgba(0, 0, 0, 0.3);">'.$row['nickname'].":</hello><br/> ".$row['msg'].'</div>';
        echo "<br/><br/><br/><br/>";
    }
}
//comments Section

//comments Section

//comments Section

//comments Section

//comments Section
?>