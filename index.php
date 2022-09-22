<?php
	if(isset($_SESSION['test_ongoing']))
		header("Location: files/quiz.php");
?>

<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Assessment Quiz Application</title>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/tilt/tilt.jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>

	</head>

	<body>
		<!-- Header -->
		<header class="header1">
			<!-- Header desktop -->
			<div class="container-menu-header">
				<div class="wrap_header">
					<!-- Logo -->
					<a style="color: red;size: 50px;" href="index.html" class="logo">
						<p ><b>Assessment Quiz Application</b></p>
					</a>

					<!-- Header Icon -->

				</div>
			</div>

			<!-- Header Mobile -->
			<div class="wrap_header_mobile">
				<!-- Logo moblie -->
				<a style="color: red;size: 50px;"  href="index.php" class="logo-mobile">
					<p ><b>Assessment Quiz Application</b></p>
				</a>

				<!-- Button show menu -->
				<div class="btn-show-menu">
					<!-- Header Icon mobile -->
					<div class="header-icons-mobile">
						<a href="#" class="header-wrapicon1 dis-block">
							<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
					</div>
				</div>
			</div>
			</div>
		</header>

		<section>
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
						<div class="login100-pic js-tilt" data-tilt>
							<img src="images/img-01.png" alt="IMG">
						</div>
						<div class="login100-form validate-form">
						<span class="login100-form-title">
							Student Login
						</span>
						
						<div class="wrap-input100 validate-input">
							<input class="input100" id="studentRollNumber" type="text" name="rollNumber"
								placeholder="Roll Number" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle-o" aria-hidden="true"></i>
							</span>
							<span class="error text-danger" id="empty_roll_number_field"></span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" id="studentPassword" type="password" name="password"
								placeholder="Password" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
							<span class="error text-danger" id="empty_roll_password_field"></span>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="login()">
								Login
							</button>
						</div>

						<div class="text-center p-t-136">
						</div>
</div>
					</div>
				</div>
			</div>
		</section>
		<script>
			$(document).ready(function () {

				if (Cookies.get('last_question_was_answered') != undefined) {
					Cookies.remove('last_question_was_answered');
					Cookies.remove('last_question');
				}
				if (Cookies.get('test_submitted_status') != undefined)
					Cookies.remove('test_submitted_status');	
			});


			$('.js-tilt').tilt({
				scale: 1.1
			})

			function login() {
				var someFieldIsEmpty = false;

				if (!$('#studentRollNumber').val()) {
					someFieldIsEmpty = true;
					$('#empty_roll_number_field').val("Please enter your roll number");
				}
				if (!$('#studentPassword').val()) {
					someFieldIsEmpty = true;
					$('#empty_roll_passsword_field').val("Please enter your password");
				}

				if (!someFieldIsEmpty) {
					$.ajax({
						type: 'POST',
						url: 'files/student_login.php',
						data: {
							'rollNumber': $('#studentRollNumber').val(),
							'password': $('#studentPassword').val(),
						},
						success: function (response) {
							if(response == "STUDENT_RECORD_NOT_FOUND")
								alert("Wrong Credentails entered");
							else
								window.location.replace("files/dashboard.php");
						}
					});
				}
			}
		</script>
	</body>
</html>