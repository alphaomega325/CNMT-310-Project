<?php

require_once("DB.class.php");

$db = new DB();

$album_or_artist = $_POST;

//Validation goes here


//Data Sanitization goes here
$album_or_artist = $db->dbEsc($album_or_artist);

//Resulting sheet goes here

?>
