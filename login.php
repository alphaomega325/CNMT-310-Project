<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
print "<table width='300' border='0' align='left' cellpadding='0' cellspacing='1' bgcolor='#CCCCCC'>\n";
print "<tr>\n";
print "<form name='form1' method='post' action='check_login.php'>\n";
print "<td>\n";
print "<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#FFFFFF'>\n";
print "<tr>\n";
print "<td colspan='3'><strong>Member Login </strong></td>\n";
print "</tr>\n";
print "<tr>\n";
print "<td width='78'>Username</td>\n";
print "<td width='6'>:</td>\n";
print "<td width='294'><input name='myusername' type='text' id='myusername'></td>\n";
print "</tr>\n";
print "<tr>\n";
print "<td>Password</td>\n";
print "<td>:</td>\n";
print "<td><input name='mypassword' type='text' id='mypassword'></td>\n";
print "</tr>\n";
print "<tr>\n";
print "<td>&nbsp;</td>\n";
print "<td>&nbsp;</td>\n";
print "<td><input type='submit' name='Submit' value='Login'></td>\n";
print "</tr>\n";
print "</table>\n";
print "</td>\n";
print "</form>\n";
print "</tr>\n";
print "</table>\n";

?>