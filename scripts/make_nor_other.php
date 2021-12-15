<?php
include('../inc/connect.inc.php');
session_start();
$un = $_POST['user'];

mysql_query("UPDATE users SET user_pos = 'nor' WHERE username = '$un'");
$query = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='" . $_SESSION ['user_login'] . "'" ) );
if ($query ['user_pos'] == 'admin') {
	$query2 = mysql_fetch_assoc ( mysql_query ( "SELECT user_pos FROM users WHERE username='" . $un . "'" ) );
	if ($query2 ['user_pos'] == 'admin') {
		?><button onclick="javascript: make_mod_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Moderator</button>
			<br />
			<button style="margin-top: 20px;"
				onclick="javascript: make_nor_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Normal</button>
							                    <?php
			}
			if ($query2 ['user_pos'] == 'mod') {
				?><button
				onclick="javascript: make_admin_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Adminstrator</button>
			<br />
			<button style="margin-top: 20px;"
				onclick="javascript: make_nor_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Normal</button>
							                    <?php
			}
			if ($query2 ['user_pos'] == 'nor') {
				?><button onclick="javascript: make_mod_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Moderator</button>
			<br />
			<button style="margin-top: 20px;"
				onclick="javascript: make_admin_other('<?php echo $un; ?>')"
				class="btn btn-primary">Make Admin</button>
							                    <?php
			}
		}
echo '<br/><br/><span class="good">User '.$un.' became Normal User</span>';
?>
