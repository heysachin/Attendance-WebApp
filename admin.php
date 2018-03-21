<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="styles/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<link rel="stylesheet" href="styles/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="styles/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="styles/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="styles/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Students Login</title>

</head>

<body class="stretched">
	<?php
    session_start();
    if(isset($_SESSION["user"]))
    {
        header("location:php/autologin.php");
    }
?>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/1.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">

					<div class="container-fluid vertical-middle divcenter clearfix">

						<div class="center">
							<a href="index.php"><img src="images/logo.png" style="height: 200px" alt="Canvas Logo"></a>
						</div>

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								<form role="form" action="php/login1.php" method="post" class="login-form">
									<h3>Login to your Account</h3>

									<div class="col_full">
										<label for="login-form-username">Username:</label>
										<input type="text" name="email" placeholder="Username" id="form-username" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" name="password" placeholder="Password" id="form-password" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
										<a href="#" class="btn btn-info" data-notify-type="warning" data-notify-msg="Please Contact Admin at <br>+91 80891 44967" onclick="SEMICOLON.widget.notifications(this); return false;">Can't Login?</a>
									</div>

								</form>
							</div>
						</div>

						<div class="center dark"><small>Copyrights &copy; All Rights Reserved by Tricodia.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>