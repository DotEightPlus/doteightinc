<?php
header("Content-Type:application/json");
include('functions/init.php');
if (isset($_SESSION['api_key_id']) && $_SESSION['api_key_id'] != "") {	
	$api_id = $_SESSION['api_key_id'];
	$sql = "SELECT * FROM `users` WHERE `login_id` = '$api_id'";
	$result = query($sql);
	if(row_count($result) > 0){
	$row = mysqli_fetch_array($result);
	$fname 			= $row['fname'];
	$lname 			= $row['lname'];
	$email 			= $row['email'];
	$date_reg 		= $row['datereg'];
	$user 			= $row['user_id'];
	$api_key  		= $row['login_id']; 
	response($fname, $lname, $email, $date_reg, $user, $api_key);
	mysqli_close($con);
	}else{
		response(NULL, NULL, NULL, NULL, NULL, "No Record Found");
		}
}else{
	response(NULL, NULL, NULL, NULL, NULL, NULL);
	}

function response($fname, $lname, $email, $date_reg, $user, $api_key){

	$response['firstname'] 				 = $fname;
	$response['lastname']				 = $lname;
	$response['email']					 = $email;
	$response['date_registered ']		 = $date_reg;
	$response['user'] 					 = $user;
	$response['apikey'] 				 = $api_key;		 
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>