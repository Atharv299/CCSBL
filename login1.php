<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

	<title>Weather anyalysing system
		
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(images/cloud.jpg) ;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: bottom-center;">


		<h1><p style="color:white;text-align:center;padding-top:30px">WEATHER ANALYSING SYSTEM</p></h1>
		<br>
		<h3><p style="color:white;text-align:center">RAMRAO ADIK INSTITUTE OF TECHNOLOGY</p></h3>
	
	<div class="header" style="background: #0f3f97;opacity:0.8">
		<div style="text-color:white;opacity:100%"><b><h2>Login</h2></b></div>
	</div>
	
	<form method="post" action="login.php" style="opacity:0.7">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<b><label>Username</label></b>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<b><label>Password</label></b>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<br>
			<button type="submit" style="background: #0f3f97;width:100%;color:white;border:none;border-radius:5px;padding-top:8px;padding-bottom:8px" name="login_user">Login</button>
		</div>
		<b><p>
			Not yet a member? <a href="register.php" style="color:red" >Sign up</a>
		</p></b>
	</form>


</body>
</html>