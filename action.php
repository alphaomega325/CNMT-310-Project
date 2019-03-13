<?php
//Survey database insert here
require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
    print "An error has occurred with connection\n";
    exit;
}

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
	

if (isset($_POST['major']) and
    isset($_POST['grade']) and
    isset($_POST['pizza']) )
    {
      $major = $db->dbEsc($_POST['major']);
      $grade = $db->dbEsc($_POST['grade']);
      $pizza = $db->dbEsc($_POST['pizza']);
	  $ip = $_SERVER["REMOTE_ADDR"];
	  //$time = date(DATE_RFC2822);
	  $time = 21;
      $survey = "INSERT INTO survey (submittime, major, expectedgrade, favetopping, userip) " .
             "VALUES (now(),'{$major}','{$grade}','{$pizza}', '{$ip}')";
	  $result = [];
      $result = $db->dbCall($survey); 
      //die(Header("Location: thanks.php"));
    }	
else{
	print "error";
}


	
print $page -> getBottomSection();
?>
