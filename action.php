<?php
//Survey database insert here
require_once("DB.class.php");

$db = new DB();



//result page here
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
	
if(isset($_POST['major'])){
	$major = isset($_POST['major'];
}
else {
	print "Error";
}
if(isset($_POST['grade'])){
	$grade = isset($_POST['grade'];
}
else {
	print "Error";
}
if(isset($_POST['pizza'])){
	$pizza = isset($_POST['pizza'];
}
else {
	print "Error";
}

$survey = "INSERT INTO survey (sibmittime, major, expectedgrade, favetopping, userip, sessionid)
values (0, now(), $major, $grade, $pizza)";
	
print $page -> getBottomSection();
?>
