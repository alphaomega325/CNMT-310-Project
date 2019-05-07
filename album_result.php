
<?php
//Setup for Webpage
session_start();
require_once("Template.php");
$page = new Template("Album Result");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page -> addHeadElement('<meta charset="UTF-8">');
if(!empty($_SESSION['current_user'])) {
	$page -> addHeadElement("<h1>Hello, {$_SESSION['current_user']}</h1>");
}
$page -> finalizeTopSection();
$page -> finalizeBottomSection();

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

$search = $_POST["searchInput"];

$data = array("search" => $search);

$dataJson = json_encode($data);

$postString = "data=" . urlencode($dataJson);

$contentLength = strlen($postString);

$header = array(
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: ' . $contentLength
);

//replace user folder if needed
$url = "http://cnmtsrv2.uwsp.edu/~eknip856/Sprint3/albumsearch.php";
    $ch = curl_init();
        
// Check if initialization had gone wrong    
if ($ch === false) {
    throw new Exception('failed to initialize');
}
        
curl_setopt($ch,
    CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,
    CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch,
    CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,
    CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,
    CURLOPT_URL, $url);

$return = curl_exec($ch);
        
$return = json_decode($return);

//start here
if(empty($return->result)){
    
    searchFailurePage($page, $search);
}
else
{
    successPage($page, $return);
}
//Resulting WebPages goes here
function searchFailurePage(Template $page, String $search){

    echo "<p>We have failed to find the item " . $search . " please select a different album or artist so that we can check for you again.</p>";
    print $page->getBottomSection();
}

function successPage(Template $page, $result){	
                 
    print '<table>';
   
    print '<tr>
        <td>Album Title</td>
        <td>Album Artist</td>
        <td>Album Length(min)</td>
        <td>Link</td>';
    foreach($result->result as $album){
        print "<tr>";
        print "<td>".$album->albumtitle."</dt>";
        print "<td>".$album->albumartist."</dt>";
        print "<td>".$album->albumlength."</dt>";
        print "<td class='link'><a href='".$album->URL."'>Purchase Online</dt>";
        print "</tr>";
    }

    print '</table>';
    print $page ->getBottomSection();
}
?>
