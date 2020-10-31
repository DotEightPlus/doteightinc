<?php
header("Content-Type:application/json");
include("../functions/init.php");
if (isset($_GET['order_id']) && $_GET['order_id']!="") {

	$order_id = $_GET['order_id'];

	$sql =  "SELECT * FROM `users` WHERE `login_id` = '$order_id'";
	$result = query($sql);
	if(mysqli_num_rows($result)>0) {
	$row = mysqli_fetch_array($result);

	$fname 	= $row['fname'];
	$lname 	= $row['lname'];
	$userid = $row['user_id'];
	$email	= $row['email'];
	

	response($fname, $lname, $userid,$email);
	mysqli_close($con);
	}else{
		response("No Record Found","No Record Found", "No Record Found","No Record Found");
		}
}else{
	response("No Record Found", "No Record Found", "No Record Found","Invalid Request");
	}

function response($fname, $lname, $userid,$email){
	$response['fname'] = $fname;
	$response['lname'] = $lname;
	$response['userid'] = $userid;
	$response['email'] = $email;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>