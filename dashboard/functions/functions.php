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

	$sql2 = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result2 = query($sql2);
	if(row_count($result2) == 1) {

	$_SESSION['signin'] = "Email Already Exists";	 
	redirect("./signin");

	} else {
		session_start();
		$_SESSION['email'] = $email;

		$sql = "INSERT INTO users(`fname`, `lname`, `email`, `verify`, `datereg`)";
		$sql.= " VALUES('$fname', '$lname', '$email', '0', '$datereg')";
		$result = query($sql);
		confirm($result);

	redirect("./verify");

	 }
	}
}







//verified
function verified() {

	$email = $_GET['new'];
	$verify = 1; 

	$sql = "UPDATE `users` SET `verify` = '$verify' WHERE `email` = '$email'";
	$result = query($sql);
	confirm($result);

	unset($_SESSION['token']);

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
		session_start();
		$_SESSION['email'] = $email;
		redirect("./verify");

	} else {

	 $_SESSION['sent'] = $email;
	 $_SESSION['session'] = $email;		
	 redirect("./sent");
}
} else {

	$_SESSION['signup'] = "You Don`t have an account";
	redirect("./signup");
}
}	
}	 
?>