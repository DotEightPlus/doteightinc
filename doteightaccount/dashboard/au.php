<?php
include("../functions/init.php");
if ($_GET['id'] && $_GET['id'] !='') {

	$data = $_GET['id'];

	if($data == $_SESSION['login']) {

		header("location: ./");
	} else {
		header("location: .././apierror");
	}

} else {

	header("location: .././apierror");
}

?>