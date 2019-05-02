<?php

require_once("Template.php");
require_once("DB.class.php");


$page = new Template("My Page");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

if(!isset($_POST['username']) || !isset($_POST['password']))
{

    failure_page($page, "a wrong user name or password");
    exit;
}



$db = new DB;

if($db->getConnStatus()){

    failure_page($page, "us unable to connect to database");
    exit;

}


if(!validate()){
    failure_page($page, "a wrong user name or password");
}
else {
    success_page($page);
	session_start();
}
exit;

function success_page($page){

    print $page->getTopSection();
    print '

    <h1>Login Success</h1>

    <nav>
      <a href="survey.php">Survey</a>
      <a href="privacy.php">Privacy Policy</a>
      <a href="albumform.php">Album Form</a>
    </nav>

    <article>
<h2>Success</h2>
<p> You are now connected as a user in the website, I hope that you enjoy your stay.</p>
    </article>
    
    
 ';

    print $page->getBottomSection();


}


function failure_page($page, $reason){

    print $page-> getTopSection();

    
    print'    <h1>Login Failure</h1>

    <nav>
      <a href="survey.php">Survey</a>
      <a href="privacy.php">Privacy Policy</a>
      <a href="albumform.php">Album Form</a>
    </nav>

    <article>
<h2>Login Failed</h2>
<p> Due to ' . $reason . ' we are unable to log you in, please try again or at a later time.</p>
    </article>
 
 
 ';

    print $page -> getBottomSection();

}


function validate() {
    $username = $_POST['username'];
    $password = $_POST['password'];
	$query = "SELECT * FROM user WHERE userid =" . $username . " OR email =" . $username . ";";
	$credentials = $db->dbCall($query);
	
	if ($credentials[userid] = $username || $credentials[email] = $username) {
		
		if(password_verify($password, $credentials[userpass])) {
			
			return true;
		}
	}
	
	return false;	
}//end of function

?>
