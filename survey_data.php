<?php
require_once("Template.php");
$page = new Template("Album Result");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
$page -> finalizeTopSection();
$page -> finalizeBottomSection();




//Validation goes here

if(!isset($_POST["searchInput"]))
{
    searchFailurePage($page);
    exit;
} 

$search = $_POST["searchInput"];


//Database Class setup

require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}



//Data Sanitization goes here
$search = $db->dbEsc($search);


$query = "SELECT *
        FROM survey";

$result = $db->dbCall($query);

var_dump($result);
successPage($page, $result);

//Resulting WebPages goes here

function searchFailurePage(Template $page){
    print $page -> getTopSection();

    print "<h1>Failure<h1>

    <p>We have failed to detect any items in the search bar.  Please try again later.</p>

";

    print $page->getBottomSection();

}

function successPage(Template $page, array $result){	
    print $page -> getTopSection();
    print "<h1>Success</h1>	
	<nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>
    </nav>";   
                                                
    print '<table>';
   
    foreach($result as $survey){
        print "<tr>";
        print "<td>".$survey['id']."</td>";
        print "<td>".$survey['submittime']."</dt>";
        print "<td>".$survey['major']."</dt>";	
        print "<td>".$survey['expectedgrade']."</dt>";	
		print "<td>".$survey['favetopping']."</dt>";
		print "<td>".$survey['userip']."</dt>";
		print "<td>".$survey['sessionid']."</dt>";
        print "</tr>";
    }

    print '</table>';

    print $page ->getBottomSection();
}
?>
