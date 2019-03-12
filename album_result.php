<?php
require_once("DB.class.php");

$db = new DB();

$album_or_artist = $_POST;

//Validation goes here


//Data Sanitization goes here
$album_or_artist = $db->dbEsc($album_or_artist);

$search =  $_Post['searchInput'];

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "SELECT Album, Artist
        FROM albuminfo
        WHERE Album = $search OR ARTIST = $search";

$result = $db->dbCall($query);

//Resulting sheet goes here



require_once("Template.php");
$page = new Template("Album Result");
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
	
print $result;

print '<table>';

foreach($result as $album){
	print "<tr>";
	print "<td>".$album['id']."</td>";
	print "<td>".$album['albumtitle']."</dt>";
	print "<td>".$album['albumartist']."</dt>";	
	print "<td>".$album['albumlength']."</dt>";	
	print "</tr>";
}

print '</table>';

print $page ->getBottomSection();
?>
