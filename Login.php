<?php

require_once("Template.php");

$page = new Template("Login");
$page -> addHeadElement('<link rel="stylesheet" href="css/style.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<form method ='post' action = 'Auth.php'>";
print "Username or email: <input id='username' type = 'text' name = 'username'><br>";
print "Password: <input id='password' type = 'password' name = 'password'><br>";
print "<input type = 'submit' Value = 'Submit'></form>";
print $page->getBottomSection();
