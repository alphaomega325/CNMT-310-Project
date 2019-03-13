<?php
//Setup for Webpage
require_once("Template.php");
$page = new Template("Album Result");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page -> finalizeTopSection();
$page -> finalizeBottomSection();

//Database Class setup

require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$search = $_POST["searchInput"];



//Data Sanitization goes here
$search = $db->dbEsc($search);


//Validation goes here

if(!isset($search))
{
    searchErrorPage($page);
}



$query = "SELECT albumtitle, albumartist 
        FROM album
	    WHERE albumtitle = '" . $search . "' OR albumartist = '" . $search . "';";



$result = $db->dbCall($query);


if(!(empty($result))){
    successPage($page, $result);
}
else
{
    searchFailurePage($page, $search);
}
//Resulting WebPages goes here

function searchFailurePage(Template $page, String $search){
    print $page -> getTopSection();
    

    print"<h1>Failure</h1>

    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>
    </nav>

    <p>We have failed to find the item " . $search . " please select a different album or artist so that we can check for you again.</p>

";

    print $page->getBottomSection();
}

function searchErrorPage(Template $page){
    print $page -> getTopSection();

    print"<h1>Failure</h1>
 
    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>
    </nav>
    
    <p>We have failed to detect any items in the search bar.  Please try again later.</p>

";

    print $page->getBottomSection();
}

function successPage(Template $page, array $result){	
    print $page -> getTopSection();
        var_dump($page);

    
    print "<h1>Success</h1>

    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>
    </nav>";
             

                        
    print '<table>';
   
    foreach($result as $album){
        print "<tr>";
        print "<td>".$album['albumtitle']."</dt>";
        print "<td>".$album['albumartist']."</dt>";	
        print "</tr>";
    }

    print '</table>';

    print $page ->getBottomSection();
}
?>
