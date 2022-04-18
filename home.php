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
<body>
    

<html>


    <head>

  <link rel="stylesheet" href="home.css">
</head>


<div class="notification">
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
		<?php endif ?></div>
        
<div style="border:0px solid black" class="header">
  <div style="background-color: #333;position:fixed;top:0; margin-left: 1px;width:100%;margin-right: 1px;margin-top: 0px" class="nav-menu">
      <div  class="logo">
    
      </div>
      <div  class="menu">
          <ul >
              <li><a href="home.php" class="active">Homepage</a></li>
              <li><a href="quize/index.html">QUIZ</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="addtopic.html">Discussion</a></li>
              <li><a href="https://news.un.org/en/news/topic/climate-change" target="_blank">Climate and Environment </a></li>
              <li><a href="login.php?logout='1'" >Logout</a></li>
          </ul>
      </div>
  </div>
  <div class="banner"> 
      <h1>
  <?php if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><?php endif ?></h1>
        <p>to the weather analysing system </p>
        
      <a href="#services">GET STARTED</a>
      
  </div>
</div>
<div style="height:100%;padding-top:0px" id="services" class="container">
  <div style="margin-top:80px;padding-top:80px;" class="text">
      <h1>Our Services</h1>
      <p>A quick checkout about the health of your locality's weather and environment</p>
  </div>
  <div class="main">
      <div class="single">
            
          <i class="fas fa-cloud"></i>
            <p>Weather analysis</p>
          <a href="tree.html">More info</a>
      </div>
      <div class="single">
        
          <i class="fas fa-cloud"></i>
          <p>Current air quality index</p>
          <a href="map.html">More info</a>
      </div>
      <div class="single">
          <i class="fas fa-cloud"></i>
          <p>Current weather</p>
          <a href="wheather.html">More info</a>
      </div>
  </div>

      

    <span> &copy; Website design by <b>RAIT STUDENTS</b></span>
 
</div>

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
		
	</div>
    		
</body>
</html>