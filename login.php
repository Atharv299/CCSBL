<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="lg.css">
    </head>
<body style="background:url(images/cloud.jpg) ;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: bottom-center;">
    

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
      <input type="text" name="username" placeholder="enter your email address">
      <label for="password">password</label>
       <input type="password" name="password" placeholder="password">
    </div>
    <button class="btn login" name="login_user">Continue</button>
   
    <div class="register">
        <span>New on our platform?</span>
     <a href="rg.php" class="btn" >Sign up</a>
    </div>
  </div>
</form>
</body>    
</html>