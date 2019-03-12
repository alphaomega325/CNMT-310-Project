<?php
require_once("Template.php");

$page = new Template("Congratulations");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');

$page -> finalizeTopSection();
$page -> finalizeBottomSection();

print $page -> getTopSection();
print '<h1>Success</h1>

    <nav>
      <a href="privacy.php">Privacy Policy</a>
      <a href="index.php">Home</a>
      <a href="albumform.php">Album Form</a>
    </nav>
	
	<article>
	
	<h2> Thank You </h2>
	<p> Thank you for participating in the survey, use the nav buttons to leave away from this survey.</p>
	
	</article>';
	
print $page -> getBottomSection();
//Example branch
?>
