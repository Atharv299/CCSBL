<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>

<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(images/ear.jpg) ;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: bottom-center;">
	
	<div class="header" style="background: #0f3f97;opacity:0.7">
		<h2 style="text-shadow:2px 2px 5px #e68414">Home Page</h2>
	</div>
	<div class="content" style="opacity:0.7">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3 style="margin-left:30%">
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><br>
			<div class="btn">
			
			<button onclick="location.href='treea.html'" style="padding-top:5px;padding-bottom:5px"><b>Wheather analysis</b></button>
			<br><button onclick="location.href='map.html'" style="padding-top:5px;padding-bottom:5px"><b>World air quality index</b></button>
			<br>
			<button onclick="location.href='wheather.html'" style="padding-top:5px;padding-bottom:5px"><b>Your current wheather</b></button>
			</div>
			<br>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>