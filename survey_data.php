<?php
require_once("Template.php");
session_start();
$page = new Template("Album Result");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
if(!empty($_SESSION['current_user'])) {
	$page -> addHeadElement("<h1>Hello, {$_SESSION['current_user']}</h1>");
}
$page -> finalizeTopSection();
$page -> finalizeBottomSection();

//Database Class setup

require_once("DB.class.php");

	if ($_SESSION['user_role'] == "admin") {
		
		$db = new DB();
		
		if (!$db->getConnStatus()) {
		print "An error has occurred with connection\n";
		exit;
		}

		$query = "SELECT *
				FROM survey";
				
		$result = $db->dbCall($query);
		
		authorizedPage($page, $result);
		
	}
	else {
		unautherizedPage($page);
	}


function unautherizedPage(Template $page){
	
    print $page -> getTopSection();
    print "<h2><a href = 'Login.php'>User not authorized to view survey data</a></h2>
    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>";
	if($_SESSION['user_role'] == "admin") {
		Print "<a href='survey_data.php'>Survey Data</a>";
	}
	if(!empty($_SESSION['current_user'])) {
		Print "<a href='logout.php'>Log Out</a>";
	}
	print"</nav>"; 
                                                
    print $page ->getBottomSection();
}
function authorizedPage(Template $page, array $result){

	
    print $page -> getTopSection();
    print "<h1>Success</h1>	
    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>";
	if($_SESSION['user_role'] == "admin") {
		Print "<a href='survey_data.php'>Survey Data</a>";
	}
	if(!empty($_SESSION['current_user'])) {
		Print "<a href='logout.php'>Log Out</a>";
	}
	print"</nav>";  
                                                
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