<?php

require_once("DB.class.php");
require_once("Template.php");
$page = new Template("Book Form");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print "

	<h2> Search box </h2>
    <input type=text id=searchInput value =Album_or_Artist>
    <input type=button id=mySearchbtn value=Search>

";

$db = new DB();

//var_dump($db);

$search = searchInput;

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "SELECT Album, Artist
        FROM albuminfo
        WHERE Album = $search OR ARTIST = $search";

$result = $db->dbCall($query);

var_dump($result);

print $page->getBottomSection();
?>
