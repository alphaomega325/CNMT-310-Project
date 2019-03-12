<?php
require_once("Template.php");
$page = new Template("Album Result");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page -> finalizeTopSection();
$page -> finalizeBottomSection();
	
print $page -> getTopSection();


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