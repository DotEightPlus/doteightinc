<?php
include("functions/init.php");
api_token();

$result = $_SESSION['result']; 

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
			<form class="login100-form validate-form">
				<span data-animation="fadeInUp" data-delay="200ms" class="login100-form-title p-b-37">Hi  <?php echo $result->firstname." ".$result->lastname; ?>
				</span>

				<div class="text-center  p-b-20">
					<a>
					<span class="txt1">
						Are you sure you want to grant login access?<br/>

						Only do this when you feel this website is safe enough.
					</span>
				</a>
				</div>

				<input type="text" name="webname" value="">


					<div class="flex-c p-t-12 p-b-11">
					<a href="./denied" class="login10-form-btn">
						Deny
					</a>
				</div>
					
					<div class="container-login100-form-btn">

					<button onclick="window.close();" class="login100-form-btn">
						Allow
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

