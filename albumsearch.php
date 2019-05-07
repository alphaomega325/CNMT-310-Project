<?php 

if(isset($_POST['data'])) {
    
    $data = (json_decode($_POST['data']));
    
    //Database Class setup
    require_once("DB.class.php");

    $db = new DB();

    if (!$db->getConnStatus()) {
      print "An error has occurred with connection\n";
      exit;
    }

    //Data Sanitization goes here
    $search = $db->dbEsc($data->search);
     
    $query = "SELECT * FROM album
            WHERE albumtitle = '" . $search . 
        "' OR albumartist = '" . $search . "';";
    
    $result = $db->dbCall($query);
    
    if(!empty($search)) {
        
    echo json_encode(array('result' => $result));
        
    }
}