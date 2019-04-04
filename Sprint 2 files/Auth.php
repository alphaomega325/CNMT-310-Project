<?php

require_once("Template.php");
require_once("DB.class.php");

$db = new DB;
$page = new Template("My Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(!validate()){
	Print "<a href = 'login.php'>'username or password invalid, please try again'</a>"; 
}
else {
	session_start();
}
print $page->getTopSection();
print "";
print $page->getBottomSection();

function validate($username = $_POST['username'], $password = $_POST['password']) {
	
	var $query = "SELECT * FROM user WHERE userid =" . $username . " OR email =" . $username . ";";
	$credentials = array($db->dbCall($query));
	
	if ($credentials[userid] = $username || $credentials[email] = $username) {
		
		if(password_verify($password, $credentials[userpass])) {
			
			return true;
		}
	}
	
	return false;
	
}