<?php

$message = "";
$redirect = "window.location.replace('login.php');";
if(isset($_POST['username']) && !empty($_POST['username'])) {
	$username = $_POST['username'];

    if(isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
        
        try {
            
        $data = array("username" => $username, "password" => $password);
        $dataJson = json_encode($data);

        $postString = "data=" . urlencode($dataJson);

        $contentLength = strlen($postString);

        $header = array(
          'Content-Type: application/x-www-form-urlencoded',
          'Content-Length: ' . $contentLength
        );
        //replace user folder if needed
        $url = "http://cnmtsrv2.uwsp.edu/~eknip856/Sprint3/validate.php";

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
        
        if ($return->login === true)//user successfully logs in
        {
            session_start();
            $_SESSION['current_user'] = $return->realName;
            $_SESSION['user_role'] = $return->role;
            $message = "Login Successful!";
            $redirect = "window.location.replace('index.php');";
        }
        else { //user credentials invalid
            $message = "Invalid username or Password! Try again.";
        }
        
        curl_close($ch);
            
        } catch(Exception $e) {

            trigger_error(sprintf('Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()), E_USER_ERROR);
        }//end of try/catch
    }
    else {
        $message = "One or more fields empty! Try again.";
    }
          
}
else {
    $message = "One or more fields empty! Try again.";
}
//displays appropriate message and redirects use
echo "<script type='text/javascript'>alert('$message');" .
    $redirect . "</script>";
//Javascript disabled
echo "<noscript> <a href=" . $redirect . ">" . $message . "</a></noscript>"
?>