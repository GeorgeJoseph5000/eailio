<?php
include_once ("connect.inc.php");
session_start ();
if (isset ( $_SESSION ['user_login'] )) {
	$un = $_SESSION ['user_login'];
	$row_pic = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM users WHERE username='$un' " ) );
} else {
	$un = "";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<meta name="theme-color" content="#101010" />
</head>
<body>
<?php
if (isset ( $_SESSION ['user_login'] )) {
	$ex_query = mysql_query ( "SELECT COUNT(*) AS total FROM messages WHERE user_to='$un' AND opened='no'" );
	$row_ex = mysql_fetch_assoc ( $ex_query );
	echo '<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header" role="navigation">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Eailio+</a>
                </div>
                <div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                            
				<ul class="dropdown-menu" >
				<li><a  href="../main">Portfolio</a></li> 
				<li><a  href="../templates">HTML Templates</a></li> 
				<li class="divider"></li>
				<li><a  href="index.php">Eailio</a></li>
				<li><a  href="../exams">Exams</a></li> 
				<li class="divider"></li>
				<li><a  href="../eailio2020">Eailio 2020</a></li>

                <li><a href="../challengemananger/">Challenge Manager</a></li>
				<li class="divider"></li>
				<li><a  href="../main/android.php">Focus</a></li>
				<li><a  href="../main/flutter.php">CloneGram</a></li>
				
                </ul>
            </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="account_settings.php">Account Settings</a></li>
                                <li><a href="friends.php">Friends</a></li>
                                <li><a href="find_friends.php">Find Friends</a></li>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="posts.php">Posts</a></li>
                                <li><a href="friends_requests.php">Friend Requests</a></li>
                                <li><a href="search.php">Search</a></li>
                                <li><a href="logout.php">Log out</a></li>
                                <li><a href="profile.php?u=' . $un . '">' . $un . '\'s Profile</a></li>
                                <li><a href="inbox.php">Inbox (' . $row_ex ['total'] . ')</a></li>
                                <li><a href="sent.php">Sent</a></li>
                                <li><a href="trash.php">Trash</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-picture"></span> Pictures <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="add_album.php">Add an Album</a></li>
                                <li><a href="manage_albums.php">Manage Albums</a></li>
                                <li><a href="add_photo.php">Add Photo</a></li>
                                <li><a href="manage_photos.php">Manage Photos</a></li>
                            </ul>
                        </li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cloud"></span> Programs <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="tryIt.php">Try It 2.0</a></li>
                                <li><a href="see_avaliable_friends.php">Private Messanger</a></li>
                            </ul>
						</li>
						
                        ';
	/*
	 * <li class="dropdown">
	 * <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-facetime-video"></span> Videos <b class="caret"></b></a>
	 * <ul class="dropdown-menu">
	 * <li><a href="videos.php?cat=1">Videos</a></li>
	 * <li><a href="videos.php?cat=2">Android</a></li>
	 * <li><a href="videos.php?cat=3">How to make a social network in PHP?</a></li>
	 * <li><a href="videos.php?cat=4">C#</a></li>
	 * <li><a href="videos.php?cat=5">Visual Basic</a></li>
	 * <li><a href="videos.php?cat=6">Unity</a></li>
	 * <li><a href="videos.php?cat=7">HTML5</a></li>
	 * <li><a href="videos.php?cat=8">MYSQL Database</a></li>
	 * <li><a href="videos.php?cat=9">JavaScript</a></li>
	 * <li><a href="videos.php?cat=10">AJAX Chatting Program</a></li>
	 * <li><a href="videos.php?cat=11">Adobe Photoshop</a></li>
	 * <li><a href="videos.php?cat=12">Adobe Flash</a></li>
	 * </ul>
	 * </li>
	 */
	$seePos = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username = '$un'" ) );
	if ($seePos ['user_pos'] == "mod") {
		echo '<li class="dropdown">
			                              	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-eject"></span> Moderator <b class="caret"></b></a>
			                               	<ul class="dropdown-menu">
			                                	<li><a href="ad_posts.php">Posts</a></li>
			                                	<li><a href="messages.php">Messages</a></li>
			                                	<li><a href="albums.php">Albums</a></li>
			                                	<li><a href="photos.php">Photoes</a></li>
			                                </ul>
			                               </li>';
	}
	if ($seePos ['user_pos'] == "admin") {
		echo '<li class="dropdown">
			                              	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-record"></span> Adminstrator <b class="caret"></b></a>
			                               	<ul class="dropdown-menu">
			                              		<li><a href="users.php">Users</a></li>
			                                	<li><a href="ad_posts.php">Posts</a></li>
			                                	<li><a href="messages.php">Messages</a></li>
			                                	<li><a href="albums.php">Albums</a></li>
			                                	<li><a href="photos.php">Photoes</a></li>
			                                </ul>
			                               </li>';
	}
	$query = mysql_query ( "SELECT * FROM friends_requests WHERE user_to='$un'" );
	if (mysql_num_rows ( $query ) == 0) {
		echo '<li><a href="friends_requests.php"><img src="./images/friends.png"></a></li>';
	} else {
		echo '<li><a href="friends_requests.php"><img src="./images/alert_friends.gif"></a></li>';
	}
	
	echo '</ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php?u=' . $un . '">Hello, ' . $un . '</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>';
} else {
	echo '<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Eailio+</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                            
				<ul class="dropdown-menu" >
				<li><a  href="../main">Portfolio</a></li> 
				<li><a  href="../templates">HTML Templates</a></li> 
				<li class="divider"></li>
				<li><a  href="index.php">Eailio</a></li>
				<li><a  href="../exams">Exams</a></li> 
				<li class="divider"></li>
				<li><a  href="../eailio2020">Eailio 2020</a></li>

                <li><a href="../challengemananger/">Challenge Manager</a></li>
				<li class="divider"></li>
				<li><a  href="../main/android.php">Focus</a></li>
				<li><a  href="../main/flutter.php">CloneGram</a></li>
                </ul>
            </li>
						';
	/*
	 * <li class="dropdown">
	 * <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-facetime-video"></span> Videos <b class="caret"></b></a>
	 * <ul class="dropdown-menu">
	 * <li><a href="videos.php?cat=1">Videos</a></li>
	 * <li><a href="videos.php?cat=2">Android</a></li>
	 * <li><a href="videos.php?cat=3">How to make a social network in PHP?</a></li>
	 * <li><a href="videos.php?cat=4">C#</a></li>
	 * <li><a href="videos.php?cat=5">Visual Basic</a></li>
	 * <li><a href="videos.php?cat=6">Unity</a></li>
	 * <li><a href="videos.php?cat=7">HTML5</a></li>
	 * <li><a href="videos.php?cat=8">MYSQL Database</a></li>
	 * <li><a href="videos.php?cat=9">JavaScript</a></li>
	 * <li><a href="videos.php?cat=10">AJAX Chatting Program</a></li>
	 * <li><a href="videos.php?cat=11">Adobe Photoshop</a></li>
	 * <li><a href="videos.php?cat=12">Adobe Flash</a></li>
	 * </ul>
	 * </li>
	 */
	
	echo '</ul><ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>';
}
?>
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/npm.js"></script>

	<div class="container body-content">
		<br /> <br /> <br /> <br /> <br />