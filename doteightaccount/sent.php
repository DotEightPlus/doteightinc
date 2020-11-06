<?php
include("functions/init.php");

if(!isset($_SESSION['sent'])) {

	header("location: ./error");
} else {

	$email 				= $_SESSION['sent'];
	$token 				= md5(rand(0, 99999999999));
    $_SESSION['login']  = $token;


	$to 		= $email;
    $from 		= "noreply@doteightplus.com";


    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Sign in";

    $logo = 'http://localhost/doteightplus/doteightaccount/images/white.svg';
    $url  = 'https://dotaccount.doteightplus.com';
    $link = 'https://dotaccount.doteightplus.com/dashboard/./au?id='.$token;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotAccount - DotEightPlus</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FF0000; color: white;'>";
	$body .= "<img style='margin-top: 35px; width: 50px; height: 50px;' src='{$logo}' alt='DotAccount - DotEightPlus'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffffff'><strong>Account Sign-in</strong></h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there!. Here is your sign in link to your dashboard .</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to sign in to your account</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'>For Support, call or chat: 08103171902</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>or write to: support@doteightplus.com</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>Best Regards</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left; padding-bottom: 50px;'><i>Dot Team</i></p>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    unset($_SESSION['sent']);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DotAccount - DotEightPlus</title>
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
			<form class="login100-form validate-form">
				<span data-animation="fadeInUp" data-delay="200ms" class="login100-form-title p-b-37">Check your mail
				</span>

				<div class="text-center  p-b-20">
					<a>
					<span class="txt1">
						We`ve sent a login link to your email address<br> Make sure you check your spam folders also.


					</span>
				</a>
				</div>

				<div class="text-center  p-b-20">
					<a href="./forgot">
					<span class="txt1">
						Best Regards <br/>
						<i>Dot Team</i>

						
					</span>
				</a>
				</div>


			
					<div class="container-login100-form-btn">

					<a style="color: white;" href="./signin" class="login100-form-btn">
						Sign in
					</a>

					
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
