<?php

require_once("Template.php");
$page = new Template("Album Search");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print "

	<form action= 'action.php'>
    <input type=text id=searchInput value =Album_or_Artist>
    <input type='submit' id=mySearchbtn value=Search>
	</form>
";

print $page->getBottomSection();
?>
