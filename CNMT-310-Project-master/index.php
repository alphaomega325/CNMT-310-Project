<?php
require_once("Template.php");
$page = new Template("Home");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page -> finalizeTopSection();
$page -> finalizeBottomSection();
	
print $page -> getTopSection();
print "

    <h1>Home</h1>

    <nav>
      <a href=\"survey.php\">Survey</a>
      <a href=\"privacy.php\">Privacy Policy</a>
	  <a href=\"albumform.php\">Search Album</a>
    </nav>

    <article>

      <h2>Welcome</h2>
      
      <p>Welcome to the new website that I have made for CNMT 310.</p>
      <p>Click on the survey link to go to the survey page.  And click on the privacy link to see the privacy policy.</p>
      
    </article>
    
    
 ";
  
print $page ->getBottomSection();
?>
