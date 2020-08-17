<?php
include("functions/init.php");
if(!isset($_GET['id'])){

	header("location: ./signin");
} else {

	$data = $_GET['id'];
	if($_SESSION['login'] != $data) {

		header("location: ./signin");
	} else {

		$uuid = md5($data);
		$_SESSION['id']	= $uuid;		
		$_SESSION['uuid'] = $_SESSION['session'];
	}
}

if(!isset($_SESSION['id']) && !isset($_SESSION['uuid'])) {
	header("location: ./error");
}
echo $_SESSION['id']."<br/>".$_SESSION['uuid']; 
?>