<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("DB.class.php");
$tbl_name="user";

$db = new DB();

if (!$db->getConnStatus()) {
    print "An error has occurred with connection\n";
    exit;
}
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

/*$hash = '$2y$2y$10$xfZBSbfoJaIrdR9rWYsg0.TDuxWoAR4TwKyRZszDvvXN1oZ/3qOpm';
if(password_verify($mypassword, $hash)){
	$newpass = $hash; 


$myusername = stripslashes($newpass); */

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = $db->dbEsc($myusername);
$mypassword = $db->dbEsc($mypassword);

$sql="SELECT count(*) FROM $tbl_name WHERE username='$myusername' and userpass='$mypassword';";
$result = $db->dbCall($sql);

//var_dump(result);
$result = $result[0]['count(*)'];

if($result=="1"){

$_SESSION["username"] = $myusername;
$_SESSION["password"] = $mypassword; 

$sql = "SELECT realname,user  FROM $tbl_name WHERE username='$myusername' and userpass='$mypassword';";
$result = $db->dbCall($sql);
$_SESSION["current_user"] = $result[0]['realname'];
$_SESSION["usertype"] = $result[0]['usertype'];

die(header("location:index.php"));
}
else {
    echo "Wrong Username or Password";
	print "<br/><a href = 'login.php'>Try Again</a>";
	print "<br/><a href = 'index.php'>Cancel</a>";
}
?>