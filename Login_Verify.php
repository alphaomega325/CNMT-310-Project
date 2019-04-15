<?php
	$msg = "";
	
	if (isset($_POST['submit'])){
		$con = new mysqli(host:'localhost', username:'root', passwd:'', dbname:'');
		
		$username = $con->real_escape_sring($_POST['username']);
		$password =$con->real_escape_sring($_POST['password']);
		
		$sql = $con->query(query:"SELECT id, password FROM users WHERE username = '$username'");
		if($sql->num_row >0){
			$data = $sql->fetch_array();
			if(password_verify($password, $data['passwrod'])){
				$msg = "You have been logged in !";
			}else
				$msg ="Please check your inputs!"
		}
	}