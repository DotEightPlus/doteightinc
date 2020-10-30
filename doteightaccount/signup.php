<?php
include("functions/init.php");
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
	

	<section>
	
	<div class="container-login100" style="background-image: url('images/slide.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

<?php register_user(); ?>

			<form method="post" class="login100-form validate-form">
				<span id="display" class="login100-form-title p-b-37">
					Let`s get you a space.
				</span>
				
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter your First Name">
					<input class="input100" type="text" name="fname" placeholder="First Name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter Last Name">
					<input class="input100" type="text" name="lname" placeholder="Last Name">
					<span class="focus-input100"></span>
				</div>

	<?php if(isset($_SESSION['guest'])) {
		 echo '
			
				<div class="wrap-input100 validate-input m-b-20" data-validate="Input Email">
					<input class="input100" type="email" name="email" value="'.$_SESSION['guest'].'" >
					<span class="focus-input100"></span>
				</div>';
			} else {

				echo '
					<div class="wrap-input100 validate-input m-b-20" data-validate="Input Email">
					<input class="input100" type="email" name="email" placeholder="Email Address">
					<span class="focus-input100"></span>
				</div>
				';
			}	
?>




				<div class="container-login100-form-btn">

					<button name="register" class="login100-form-btn">
						Register
					</button>

					
				</div>



				

				<div class="flex-c p-t-12 p-b-11">
						<a href="./signin" class="login10-form-btn">
						Got a Space?
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

	<?php
if(isset($_SESSION['signup'])) {

	echo '
	<script>
document.getElementById("display").innerHTML = "'.$_SESSION['signup'].'";
</script>';
unset($_SESSION['signup']);
unset($_SESSION['guest']);
}
?>


</body>
</html>