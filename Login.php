<?php

require_once("Template.php");

$page = new Template("Login");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<form method ='post' action = 'Auth.php'>";
print "username or email: <input type = 'text' name = 'username'><br>";
print "Password: <input type = 'password' name = 'password'><br>";
print "<input type = 'submit' Value = 'Submit'></form>";
print $page->getBottomSection();