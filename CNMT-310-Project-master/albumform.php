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
    <input type=text id=searchInput value =Album or Artist>
    <input type=button id=mySearchbtn value=Search>

";

print $page->getBottomSection();
?>