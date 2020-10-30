<?php
include("functions/init.php");

if(!isset($_SESSION['apisent'])) {

	header("location: ./apierror");
} else {

	$email 				= $_SESSION['apisent'];
	$token 				= rand(0, 999999);
	$_SESSION['cookie'] = $token;			


	$to 		= $email;
    $from 		= "noreply@doteightinc.com";


    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Token Code";

    $logo = 'https://dotaccount.doteightinc.com/images/white.svg';
    $url  = 'https://dotaccount.doteightinc.com';
    
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotAccount - DotEightInc</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FF0000; color: white;'>";
	$body .= "<img style='margin-top: 35px; width: 50px; height: 50px;' src='{$logo}' alt='DotAccount - DotEightInc'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffffff'><strong>Account Sign-in</strong></h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there!. Use the below token code to complete your sign in. </p>
		";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Note that this token code expires in the next 5minutes.</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'><a href='#' style='color: #fbb710; text-decoration: none'>{$token} - is your token code</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'>For Support, call or chat: 08103171902</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>or write to: support@doteightinc.com</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>Best Regards</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left; padding-bottom: 50px;'><i>Dot Team</i></p>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

    secure_api_login();

    unset($_SESSION['apisent']);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DotAccount - DotEightInc</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/dot.svg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->
</head>
<body>
	

	<section id="display">
	
	<div class="container-login100" style="background-image: url('images/opp.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">


			<form method="post" action="./apivalidate" class="login100-form validate-form">
				<span id="display" class="login100-form-title p-b-37">
					Token Code
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter token code">
					<input class="input100" type="number" name="token" placeholder="Input token code" required>
					<span class="focus-input100"></span>
				</div>

				

				<div class="container-login100-form-btn">

					<button type="submit" class="login100-form-btn">
						Validate Token
					</button>

					
				</div>




				

			
			</form>


			
		</div>
	</div>
	

	</section>
	

	<div id="dropDownSelect1"></div>
	
		
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	

</body>
</html>
