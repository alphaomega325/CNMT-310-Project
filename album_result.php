<?php
require_once("Template.php");
require_once("DB.class.php");
$page = new Template("Congratulations");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');

$page -> finalizeTopSection();
$page -> finalizeBottomSection();

print $page -> getTopSection();
print "<h1>Success</h1>

    <nav>
      <a href="privacy.php">Privacy Policy</a>
      <a href="index.php">Home</a>
      <a href="albumform.php">Album Form</a>
    </nav>"
	
$db = new DB();



$search =  $_Post['searchInput'];

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "SELECT Album, Artist
        FROM albuminfo
        WHERE Album = $search OR ARTIST = $search";

$result = $db->dbCall($query);
	
print $result;
	
print $page -> getBottomSection();
?>
