<?php
session_start();
require_once("Template.php");
$page = new Template("Home");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
if(!empty($_SESSION['current_user'])) {
	$page -> addHeadElement("<h1>Hello, {$_SESSION['current_user']}</h1>");
}
$page -> finalizeTopSection();
$page -> finalizeBottomSection();



print $page -> getTopSection();

print "
    <h1>Home</h1>

    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>";
	if($_SESSION['user_role'] == "admin") {
		Print "<a href='survey_data.php'>Survey Data</a>";
	}
	if(!empty($_SESSION['current_user'])) {
		Print "<a href='logout.php'>Log Out</a>";
	}
Print '</nav>

    <article>

      <h2>Welcome</h2>
      
      <p>Welcome to the new website that I have made for CNMT 310.</p>
      <p>Click on the survey link to go to the survey page.  And click on the privacy link to see the privacy policy.</p>
      
    </article>

 ';
  
print $page ->getBottomSection();
?>
