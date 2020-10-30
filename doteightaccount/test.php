<?php
include("functions/init.php");
if (isset($_POST['token']) && isset($_SESSION['logid'])) {
echo $_SESSION['logid']. "<br>";
echo $_SESSION['apisession']. "<br>";

echo $_POST['token']. "<br>";

$one = clean($_SESSION['apisession']);
	$two = clean($_POST['token']);

	$api_id = md5($two.$one);

echo $api_id. "<br>";
if($api_id == $_SESSION['logid']) {
	$url = "https://dotaccount.doteightinc.com/api/".$api_id;

	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);

	echo $result->order_id;

	}  else {

	redirect("./apierror");
}
} else {

	redirect("./apierror");
}
?>