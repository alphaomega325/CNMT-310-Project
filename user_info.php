<?php
	$msg = "";
	
	if (isset($_POST['submit'])){
		$con = new mysqli(host:'localhost', username:'root', passwd:'', dbname:''); //Please change the username, password, dbname of this line, I don't know what dbname we are using.
		
		$username = $con->real_escape_sring($_POST['username']);//These varribles are from authschema on D2L, please change some if we use other varribles.
		$password =$con->real_escape_sring($_POST['password']);
		$Cpassword =$con->real_escape_sring($_POST['Cpassword']);
		$role =$con->real_escape_sring($_POST['role']);
		$realname =$con->real_escape_sring($_POST['realname']);
		$userstatus =$con->real_escape_sring($_POST['userstatus']);
		
		if ($password != $Cpassword)//Here is the confirmation of password.
			$msg = "Please Check Your Password!";
		else {
			$hash = password_hash($password, algo:PASSWORD_BCRYPT);
			$con->query(query:"INSERT INTO users (username, password,role, realname, userstatus) VALUES('$username', '$hash','$role', 'realname', 'userstatues')");//Again, I'm not sure about what names we use in database, so please change if needed.
			$msg = "You have added informations"
		}
	}