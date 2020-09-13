<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="utf-8">

	<title>Login Panel </title>

	<?php $path = $config['baseurl'].'assets/'; ?>



	<link rel="stylesheet" href="<?php echo $path; ?>css/animate.css">

	<!-- Custom Stylesheet -->

	<link rel="stylesheet" href="<?php echo $path; ?>css/style.css">



	<script src="<?php echo $path; ?>js/jquery.min.js"></script>

</head>



<body>

	<div class="container">

		<div class="top">

			<h1 id="title" class="hidden"><span id="logo"> </span></h1>

		</div>

		<div class="login-box animated fadeInUp" >

			<div class="box-header" style="background-color:#fff;">

				<img width="160px" height="90px" src="<?php echo '../images/header/'; ?><?php echo $config['fotoheader']; ?>">

			</div>

			

			<div class="frm" align="center">

				<form action="index.php?go=auth" method="POST" style="text-align:left;">

					<label for="username">Username</label>

					<br/>

					<input type="text" name="username"  id="username" required="" >

					<br/>

					<label for="password">Password</label>

					<br/>

					<input name="password" type="password" id="password"  required="">

					<br/>

					<button type="submit" class="btnLogin" name="btnLogin">Sign In</button>

					<br/>

				</form>

			</div>

		</div>

	</div>

</body>



<script>

	$(document).ready(function () {

    	$('#logo').addClass('animated fadeInDown');

    	$("input:text:visible:first").focus();

	});

	$('#username').focus(function() {

		$('label[for="username"]').addClass('selected');

	});

	$('#username').blur(function() {

		$('label[for="username"]').removeClass('selected');

	});

	$('#password').focus(function() {

		$('label[for="password"]').addClass('selected');

	});

	$('#password').blur(function() {

		$('label[for="password"]').removeClass('selected');

	});

</script>



</html>





