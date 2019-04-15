<?php

if (isset($_POST['major']) and
    isset($_POST['grade']) and
    isset($_POST['pizza']) )
{
    require_once("DB.class.php");
    
    $db = new DB();
    
    if (!$db->getConnStatus()) {
        survey_failure();
        exit;
    }
    $major = $db->dbEsc($_POST['major']);
    $grade = $db->dbEsc($_POST['grade']);
    $pizza = $db->dbEsc($_POST['pizza']);
    $ip = $_SERVER["REMOTE_ADDR"];
    //Survey database insert here
    
    
    $survey = "INSERT INTO survey (submittime, major, expectedgrade, favetopping, userip) " .
            "VALUES (now(),'{$major}','{$grade}','{$pizza}', '{$ip}')";
    $result = [];
    $result = $db->dbCall($survey);
    survey_success();
}	
else{
    survey_failure();
}



//result page here
function survey_success(){

    $page = pagesetup("Survey_Success");

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
		
    print $page -> getBottomSection();
}

function survey_failure(){

    $page = pagesetup("Survey_Failure");

    print '<h1>Failure</h1>

    <nav>
      <a href="privacy.php">Privacy Policy</a>
      <a href="index.php">Home</a>
      <a href="albumform.php">Album Form</a>
    </nav>
	
	<article>
	
	<h2> Thank You </h2>
	<p> Thank you for participating in the survey, Unfortunately due to either a problem on either our or your end we can\'t load the survey results into the database.  Please try again at a later date.</p>
	
	</article>';

    print $page -> getBottomSection();
}

function pagesetup(String $header){
    require_once("Template.php");
    $page = new Template($header);
    $page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
    $page -> addHeadElement('<meta charset="UTF-8">');
    $page -> finalizeTopSection();
    $page -> finalizeBottomSection();
    
    print $page -> getTopSection();
    return $page;


}

?>
