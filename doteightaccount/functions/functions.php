<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}

function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}



function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}


/****register user*****/
function register_user() {

	if($_SERVER['REQUEST_METHOD'] == "POST") {

	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$email = clean($_POST['email']);

	$datereg = date("Y-m-d h:i:sa");

	$const 	= ".me-";
	$id 	= rand(0, 9999);

	$user  = $const.$id;

	$sql2 = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result2 = query($sql2);
	if(row_count($result2) == 1) {

	$_SESSION['signin'] = "Email Already Exists";	 
	redirect("./signin");

	} else {
		$_SESSION['email'] = $email;

		$sql = "INSERT INTO users(`fname`, `lname`, `email`, `verify`, `datereg`, `user_id`)";
		$sql.= " VALUES('$fname', '$lname', '$email', '0', '$datereg', '$user')";
		$result = query($sql);
		confirm($result);


		//greet user via notification
		$sbj = "You are Welcome";
		$msg = "Dear ".$fname.' '.$lname.",<br/> thank you for creating an account with DotAccount.";
		$sn  =  rand(0, 9999);

		$sql2 = "INSERT INTO user_notify(`subject`, `message`, `status`, `user_id`, `date`, `sn`)";
		$sql2.= " VALUES('$sbj', '$msg', 'unread', '$user', '$datereg', '$sn')";
		$result2 = query($sql2);
		confirm($result2);

	redirect("./verify");

	 }
	}
}



//validate verify
function validate_verify() {

	$email 				= $_SESSION['email'];
	$token 				= md5(rand(0, 99999999999));
	$_SESSION['token']  = $token;

	
	$to 		= $email;
    $from 		= "noreply@doteightinc.com";


    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Account Verification";

    $logo = 'https://dotaccount.doteightinc.com/images/white.svg';
    $url  = 'https://dotaccount.doteightinc.com';
    $link = 'https://dotaccount.doteightinc.com/./verified?id='.$token.'&new='.$to;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotAccount - DotEightInc</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FF0000; color: white;'>";
	$body .= "<img style='margin-top: 35px; width: 50px; height: 50px;' src='{$logo}' alt='DotAccount - DotEightInc'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffffff'><strong>Account Verification</strong></h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there!. Thank you for creating an account with us.</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to activate your account</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'>For Support, call or chat: 08103171902</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>or write to: support@doteightinc.com</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>Best Regards</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left; padding-bottom: 50px;'><i>Dot Team</i></p>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    unset($_SESSION['email']);

} 


//verified
function verified() {

	$email = $_GET['new'];
	$verify = 1; 

	$sql = "UPDATE `users` SET `verify` = '$verify' WHERE `email` = '$email'";
	$result = query($sql);
	confirm($result);


}






//login
function login() {
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$email  = clean($_POST['email']);

	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result = query($sql);
	if(row_count($result) == 1) {
		$row = mysqli_fetch_array($result);

	$active =  $row['verify'];

	if ($active == 0) {
		$_SESSION['email'] = $email;
		redirect("./verify");

	} else {

	 $_SESSION['sent'] = $email;
	 $_SESSION['session'] = $email;		
	 redirect("./sent");
}
} else {

	$_SESSION['signup'] = "You Don`t have an account";
	$_SESSION['guest']  = $email; 
	redirect("./signup");
}
}	
}	 






//securing the user login 
function secure_login() {
	if(isset($_GET['id']) && isset($_SESSION['session'])) {

		$logid  =  clean($_GET['id']);
		$ses 	=  clean($_SESSION['session']); 

		$newid  =  md5($logid.$ses);	

		$sql = "UPDATE `users` SET `login_id` = '$newid' WHERE `email` = '$ses'";
		$result = query($sql);

		unset($ses);
		
		$_SESSION['logid'] = $newid;
				
	} else {

		redirect("./logout");
	}

}




//check the session for each user activity
function chck_session () {

	if(!isset($_SESSION['logid'])) {

		redirect("./logout");
	} else {

		$useid = $_SESSION['logid'];



		//get user records
		$sql = "SELECT * from `users` where `login_id` = '$useid'";
		$result = query($sql);
		if(row_count($result) == 1) {
		$_SESSION['row'] = mysqli_fetch_array($result);

		//user notification determiner
		$usernotify = $_SESSION['row']; 

		notify($usernotify);
		}
	}
} 




//user notifcations Alert
function notify($usernotify) {

	$notify = $usernotify['user_id'];

	//set universal user_id
	$_SESSION['user_id'] = $notify;

		$sql = "SELECT * from `user_notify` where `user_id` = '$notify' and `status` = 'unread'";
		$result = query($sql);
		$_SESSION['useralert'] = row_count($result);
	}



//save last-seen time
function last_seen() {

		$useid = $_SESSION['logid'];
		$lastseen 	=  date("Y-m-d h:i:sa");

		$sql = "UPDATE `users` SET `lstseen` = '$lastseen' WHERE `login_id` = '$useid'";
		$result = query($sql);
}



//tour condition
function tour() {

	$tour_id = $_SESSION['user_id'];
	
	$sql = "SELECT * from `users` where `user_id` = '$tour_id'";
	$result = query($sql);
	$row = mysqli_fetch_array($result);

}





//Api inputs for OTP verification
function apiput() {
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$email  = clean($_POST['email']);

	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result = query($sql);
	if(row_count($result) == 1) {
		$row = mysqli_fetch_array($result);

	$active =  $row['verify'];

	if ($active == 0) {
		$_SESSION['email'] = $email;
		redirect("./apiverify");

	} else {

	 $_SESSION['apisent'] = $email;
	 $_SESSION['apisession'] = $email;
	 redirect("./apisent");
}
} else {
	$_SESSION['guest'] = $email;
	redirect("./create");
}
}	
}





//securing the user API login 
function secure_api_login() {
	
	if(isset($_SESSION['cookie']) && isset($_SESSION['apisession'])) {

		$logid  =  clean($_SESSION['cookie']);
		$ses 	=  clean($_SESSION['apisession']); 

		$newid  =  md5($logid.$ses);	

		//update api login
		$sql = "UPDATE `users` SET `login_id` = '$newid' WHERE `email` = '$ses'";
		$result = query($sql);
	
		unset($ses);
		
		$_SESSION['logid'] = $newid;
				
	} else {
		session_destroy();
		redirect("./apierror");
	}

}




//validate user API token 
function api_token() {

if (isset($_POST['token']) && isset($_SESSION['logid'])) {

	$one = clean($_SESSION['apisession']);
	$two = clean($_POST['token']);

	$api_id = md5($two.$one);
	if($api_id == $_SESSION['logid']) {
		$_SESSION['api_key_id'] = $api_id;
	$url = "http://localhost/doteightinc/doteightaccount/api";
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);

	$_SESSION['result'] = $result;

	
	
} else {
	session_destroy();
	redirect("./apierror");
} 
} else {
	session_destroy();
	redirect("./apierror");
}   
}  




//user api denied
function destroy_all() {

	session_destroy();
	
	echo "<script>window.close();
	</script>";

}             
?>