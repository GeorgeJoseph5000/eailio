<title>Private Messanger</title>
<?php include 'inc/header.inc.php'; 
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
include 'inc/vars.inc.php';
$messanger = true;
include 'inc/aside.inc.php';
?>
<div class="col-md-9">
    <?php
        $chatun = "";
        if($_GET['userChat'] == ''){
            echo '<script> window.location="home.php"</script>';
        }else{
            $add_friend_check = mysql_query("SELECT * FROM users WHERE username='$un'");
	    $get_row = mysql_fetch_assoc($add_friend_check);
	    $get_friends = $get_row['friends_array'];
	    $get_explode = explode(",", $get_friends);
            foreach (array_slice($get_explode,1) as $key => $value) {
                if($_GET['userChat'] == $value){
                    $chatun = $_GET['userChat'];
                }
            }
            if($chatun == ""){
                echo '<script> window.location="home.php"</script>';
            }
        }
        
    ?>
    <h2>Chat <?php echo $chatun; ?></h2>
    <hr/>
    <div class="chat">
        <input type="text" id="name" class="form-control chat-name" placeholder="Your Nickname" /><br/>
        <div id="results" class="chat-messages"></div><br/>
        <textarea placeholder="Type your message..." class="form-control chat-area" id="msg"></textarea><br/>
        <button style="display: block;" onclick="javascript: send_chat()" class="btn btn-default">Send</button>
        <div id="status"></div></div>
    </div>
</div>
<?php include 'inc/footer.inc.php'; ?>
<p id="user_send" style="display: none;"><?php echo $un; ?></p>
<p id="user_to" style="display: none;"><?php echo $chatun; ?></p>
<script src="https://upbeat-albattani-94c4c1.netlify.app/chat.js"></script>

<script src="js/chat_messenger.js"></script>

