<?php
header("Content-Type:application/json");
include("functions/init.php");
if (isset($_GET['order_id']) && $_GET['order_id']!="") {

	$order_id = $_GET['order_id'];

	$sql =  "SELECT * FROM `users` WHERE `user_id` = '$order_id'";
	$result = query($sql);
	if(mysqli_num_rows($result)>0) {
	$row = mysqli_fetch_array($result);

	$fname 	= $row['fname'];
	$lname 	= $row['lname'];
	$userid = $row['user_id'];
	
	response($fname, $lname, $userid);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($fname, $lname, $userid){
	$response['fname'] = $fname;
	$response['lname'] = $lname;
	$response['userid'] = $userid;
	
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>