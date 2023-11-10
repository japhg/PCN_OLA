<?php
session_start();

require "../database/connection.php";
require "../body/function.php";
require "mail_applicant.php";

$error = array();



$mode = "enter_email";
if (isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}

//something is posted
if (count($_POST) > 0) {

	switch ($mode) {
		case 'enter_email':
			// code...
			$email = $_POST["email"];
			//validate email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Please enter a valid email";
			} elseif (!valid_email($email)) {
				$error[] = "That email was not found";
			} else {

				$_SESSION['forgot']['email'] = $email;
				send_email($email);
				header("Location: forgot_employer.php?mode=enter_code");
				die;
			}
			break;

		case 'enter_code':
			// code...
			$code = $_POST['code'];
			$result = is_code_correct($code);

			if ($result == "the code is correct") {

				$_SESSION['forgot']['code'] = $code;
				header("Location: forgot_employer.php?mode=enter_password");
				die;
			} else {
				$error[] = $result;
			}
			break;

		case 'enter_password':
			// code...
			$pass = clean($_POST['password']);
			$conpass = clean($_POST['password2']);

			if ($pass !== $conpass) {
				$error[] = "Passwords do not match";
			} elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
				header("Location: forgot_employer.php");
				die;
			} else {

				save_password($pass);
				if (isset($_SESSION['forgot'])) {
					unset($_SESSION['forgot']);
				}

				header("Location: login_employer.php");
				die;
			}
			break;

		default:
			// code...
			break;
	}
}

function send_email($email)
{

	global $con;

	$expire = time() + (60 * 3);
	$code = rand(10000, 99999);
	$email = addslashes($email);

	$query = "insert into codes (email_address,code,expire) value ('$email','$code','$expire')";
	mysqli_query($con, $query);

	//send email here
	send_mail($email, 'Password reset', "Your code is " . $code);
}

function save_password($pass)
{

	global $con;

	$pass = clean($_POST["password"]);
	$passHashed = password_hash($pass, PASSWORD_DEFAULT);
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "update employer_tbl set password = '$passHashed' where email_address = '$email' limit 1";
	mysqli_query($con, $query);
}

function valid_email($email)
{
	global $con;

	$email = addslashes($email);

	$query = "select * from employer_tbl where email_address = '$email' limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			return true;
		}
	}

	return false;
}

function is_code_correct($code)
{
	global $con;

	$code = addslashes($code);
	$expire = time();
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "select * from codes where code = '$code' && email_address = '$email' order by id desc limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['expire'] > $expire) {

				return "the code is correct";
			} else {
				return "the code is expired";
			}
		} else {
			return "the code is incorrect";
		}
	}

	return "the code is incorrect";
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../img/hrlogo.png" type="image/x-icon">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
	<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">

	<title>Forgot Password</title>
</head>

<body>
	<style type="text/css">
		@font-face {
			font-family: 'Roboto';
			src: url('../css/fonts/Roboto/Roboto-Regular.ttf');
		}

		@font-face {
			font-family: 'Poppins';
			src: url('../css/fonts/Poppins/Poppins-Regular.ttf');
		}

		* {
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
		}

		form {
			width: 100%;
			max-width: 400px;
			margin: auto;
			padding: 10px;
		}

		.textbox {
			padding: 5px;
			width: 375px;
		}

		.image {
			z-index: -1;
			margin-left: 6rem;
		}

		h2 {
			font-family: 'Poppins', sans-serif;
			text-align: center;
			color: #6559ca;
		}

		#logo a {
			text-decoration: none;
			font-size: 200%;
			color: black;
		}

		@media screen and (max-width: 769px) {
			#image {
				display: none !important;
			}
		}

		@media screen and (min-width: 770px) and (max-width: 1060px) {
			#image {
				display: none !important;
			}

			.section {
				justify-content: center;
			}
		}
	</style>

	<?php

	switch ($mode) {
		case 'enter_email':
			// code...
	?>

			<div class="section register min-vh-100 d-flex flex-column align-items-left justify-content-center py-4">

				<div class="container">
					<div class="row justify-content-center">

						<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
							<div class="d-flex justify-content-center py-4" id="logo">
								<a href="../index.php" class="logo d-flex align-items-center w-auto">
									<img src="../img/hrlogo.png" alt="HR Logo" width="30%">
									<span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">JOB PORTAL</span>
								</a>
							</div>
							<form method="post" action="forgot_employer.php?mode=enter_email">
								<h2 style="text-align: center; color: #6559ca; font-weight: 800;">FORGOT PASSWORD</h2>
								<br><br>
								<h5 style="font-family: 'Roboto', sans-serif; text-align: center;">Enter your email below</h5>
								<span style="font-size: 12px;color:red;">
									<?php
									foreach ($error as $err) {
										// code...
										echo $err . "<br>";
									}
									?>
								</span>
								<input class="textbox form-control" type="email" name="email" placeholder="Email Address" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid #6559ca; box-shadow: none;"><br>
								<br style="clear: both;">
								<input type="submit" class="btn" value="Next" style="background: #6559ca; color: #fff; float: right;">

								<div><a href="login_employer.php" class="btn btn-dark">Login</a></div>
							</form>
						</div>
						<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-start" id="image">
							<div class="image">
								<img src="../img/Forgot password.gif" alt="Forgot Password" width="100%" class="rounded">
							</div>
						</div>
					</div>
				</div>

				</section>
			<?php
			break;

		case 'enter_code':
			// code...
			?>
				<div class="section register min-vh-100 d-flex flex-column align-items-left justify-content-center py-4">

					<div class="container">
						<div class="row justify-content-center">

							<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
								<div class="d-flex justify-content-center py-4" id="logo">
									<a href="../index.php" class="logo d-flex align-items-center w-auto">
										<img src="../img/hrlogo.png" alt="HR Logo" width="30%">
										<span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">JOB PORTAL</span>
									</a>
								</div>
								<form method="post" action="forgot_employer.php?mode=enter_code">
									<h2 style="text-align: center; color: #6559ca; font-weight: 800;">FORGOT PASSWORD</h2>
									<br><br>
									<h5 style="font-family: 'Roboto', sans-serif; text-align: center;">Enter your the code sent to your email</h5>

									<span style="font-size: 12px;color:red;">
										<?php
										foreach ($error as $err) {
											// code...
											echo $err . "<br>";
										}
										?>
									</span>

									<input class="textbox form-control" type="text" name="code" placeholder="Code" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid #6559ca; box-shadow: none;"><br>
									<br style="clear: both;">
									<input type="submit" class="btn" value="Next" style="background: #6559ca; color: #fff; float: right;">
									<div><button type="button" onclick="window.history.go(-1)" class="btn btn-dark">Back</button></div>
								</form>
							</div>
							<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-start" id="image">
								<div class="image">
									<img src="../img/Forgot password.gif" alt="Forgot Password" width="100%" class="rounded">
								</div>
							</div>
						</div>
					</div>

					</section>
				<?php
				break;

			case 'enter_password':
				// code...
				?>
					<div class="section register min-vh-100 d-flex flex-column align-items-left justify-content-center py-4">

						<div class="container">
							<div class="row justify-content-center">

								<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
									<div class="d-flex justify-content-center py-4" id="logo">
										<a href="../index.php" class="logo d-flex align-items-center w-auto">
											<img src="../img/hrlogo.png" alt="HR Logo" width="30%">
											<span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">JOB PORTAL</span>
										</a>
									</div>
									<form method="post" action="forgot_employer.php?mode=enter_password">
										<h2 style="text-align: center; color: #6559ca; font-weight: 800;">FORGOT PASSWORD</h2>
										<br><br>
										<h5 style="font-family: 'Roboto', sans-serif; text-align: center;">Enter your new password</h5>
										<span style="font-size: 12px;color:red;">
											<?php
											foreach ($error as $err) {
												// code...
												echo $err . "<br>";
											}
											?>
										</span>

										<input class="textbox form-control" type="password" name="password" placeholder="Password" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid #6559ca; box-shadow: none;"><br>
										<input class="textbox form-control" type="password" name="password2" placeholder="Retype Password" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid #6559ca; box-shadow: none;"><br>
										<br style="clear: both;">
										<input type="submit" value="Update" class="btn" style="background: #6559ca; color: #fff; float: right;">
										<div><button type="button" onclick="window.history.go(-1)" class="btn btn-dark">Back</button></div>
									</form>
								</div>
								<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-start" id="image">
									<div class="image">
										<img src="../img/Forgot password.gif" alt="Forgot Password" width="100%" class="rounded">
									</div>
								</div>
							</div>
						</div>

						</section>
				<?php
				break;

			default:
				// code...
				break;
		}

				?>
				<br><br><br><br><br><br><br><br><br>
				<?php include '../body/footer.php'; ?>
</body>

</html>