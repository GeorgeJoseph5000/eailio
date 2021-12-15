</div>
<script>
<?php 
if(isset($_SESSION['user_login'])){
?>
	window.onbeforeunload = function(){
		return "You must log out before closing the window because if you didn't log out your account could be hacked!";	
	};
	$('a').click(function(){
		window.onbeforeunload = null;
	});
	$('button').click(function(){
		window.onbeforeunload = null;
	});
		$('input').click(function(){
		window.onbeforeunload = null;
	});
	<?php 
}
	?>
	
</script>
<br><br><br>
<footer>

<div>© 2021 Copyright:
    <a href="index.php"> Eailio</a>
    Created and Coded by George Joseph
</div>

</footer>
</body>
</html>