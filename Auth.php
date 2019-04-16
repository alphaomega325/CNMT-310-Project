<?php
session_start();
require_once("DB.class.php");

$db = new DB;

if(isset($_POST['username'])) {
	$username = $_POST['username'];
}
if(isset($_POST['password'])) {
	$password = $_POST['password'];
}
	if (!$db->getConnStatus()) {
		print "An error has occurred with connection\n";
		exit;
	}

		$query = "SELECT * FROM user, user2role, role WHERE (user.id = user2role.userid AND user2role.roleid = role.id)
		AND '" . $username . "' = user.username ;";
		
	$userinfo = $db->dbCall($query);

	if(validate($userinfo, $username, $password)){
		
		$_SESSION['current_user'] = $userinfo[0]['realname'];
		$_SESSION['user_role'] = $userinfo[0]['rolename'];
		header('Location: index.php');
	}	
	else {
		$printresult = "<a href = 'Login.php'>Username or password invalid</a>";	
	}
	
function validate($userinfo, $username, $password) {
	
	if ($userinfo[0]['username'] == $username || $userinfo[0]['email'] == $username) {
		
		if(password_verify($password, $userinfo[0]['userpass'])) {
			
			return true;
		}
	}
	
	return false;	
}//end of function
?>