<?php 

if(isset($_POST['data'])) {
    $data = (json_decode($_POST['data']));

require_once("DB.class.php");

$db = new DB;

	if (!$db->getConnStatus()) {
		print "An error has occurred with connection\n";
		exit;
	}
		$query = "SELECT * FROM user, user2role, role WHERE (user.id = user2role.userid AND user2role.roleid = role.id)
		AND '" . $data->username . "' = user.username ;";
		
    $userinfo = $db->dbCall($query);

	if(validate($userinfo, $data)){
		
        echo json_encode(array('realName' => $userinfo[0]['realname'], 'role' => $userinfo[0]['rolename'], 'login' => true));
		
	}
    else {
        echo json_encode(array('login' => false));
    }
}
	
function validate($userinfo, $data) {
	
	if ($userinfo[0]['username'] == $data->username|| $userinfo[0]['email'] == $data->username) {
		
		if(password_verify($data->password, $userinfo[0]['userpass'])) {
			
            return true;
	   }
    }
}//end of function 
?>