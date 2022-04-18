<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="rg.css">
</head>
<body style="background:url(images/ear.jpg) ;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: bottom-center">

<div class="container" style="">
  <div class="login-container">
    <h3>Sign in</h3>
    <form method="post" action="login.php" >

		<?php include('errors.php'); ?>
  <div class="input-group">
      <div class="label">
        <label for="text">username </label>
        <small>Need help?</small>
      </div>
      <input type="text" name="username" value="<?php echo $username; ?>" placeholder="enter your username">
      <label for="Email">Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>"placeholder="enter your email address">
       <label for="password">password</label>
       <input type="password" name="password_1" placeholder="password">
       <label for="password">Confirm password</label>
       <input type="password" name="password_2" placeholder="password">
    </div>
    <button class="btn login" name="reg_user">Register</button>
   
    <div class="register">
        <span>Already a member?</span>
     <a href="login.php" class="btn" >Sign in</a>
    </div>
  </div>
</form>
</body>    
</html>