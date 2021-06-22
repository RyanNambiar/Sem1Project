<!DOCTYPE html>

<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
	<title>Retro Games</title>
	<meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="Simple Brown Background Templates">
   
	<link href="css/style.css" rel="stylesheet" type="text/css">

<link rel="icon" 
      type="image/png" 
      href="http://www.simplewebsitetemplates.com/favicon.png">


	
</head>
<body>

	<div class="fb-like" data-href="https://www.facebook.com/SimpleWebsiteTemplates/" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="verdana"></div>

	<div id="header">
		<div>
			<a href="index.php"><img class="logo" src="images/Retro.png" width="900" height="100" alt="Simple Website Templates" title="Simple Website Templates"></a>
			
			<ul class="navigation">
				<li>	
					<a href="index.php">Home</a>
				</li>
				
				<li>
					<a href="Games.php">Games</a>
				</li>
				<li>
					<a href="Review.php">Review</a>
				</li>
				<li>
					<a href="Cart.php">Cart</a>
				</li>
                <li>
					<a class="Login" href="Login.php"><?php 
																session_start();
																if(isset($_SESSION['user'])){
																print("Logout");
																}else	print("Login") ?></a>
				</li>
				<li>
					<a href="Contact.php" target="_top">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div id="content">
			<div>
				<div >
				  <h1>Password Recovery</h1>
				  <form action="AdminForgotpw.php" method="POST">
				  Username :<input type="text" name="admin" placeholder="Enter Username"><br><br>
				  <input type="submit" name="sub" value="Reset Password"><br><br>
				 
				  
				  
				  <?php
				  if(isset($_POST['sub'])){
					  $admin=$_POST['admin'];
					  setcookie("user",$admin,time()+365*24*60*60, '/');
					  //$password =$_POST['pw'];
					  include_once 'database.php';
					  $sel = "SELECT * FROM `$admin` where USERNAME='$admin'";
					  $rs=mysqli_query($conn,$sel);
					  
					if(mysqli_num_rows($rs)>0){
					?>
					<form action="AdminForgotpw.php" method="POST">
					Enter Your New Password :<input type="Password" name="npw" required="true"><br>
					<input type="submit" name="reset" value="Submit">
					</form>
					<?php
					
					
					
				  }else{
						print("Username Doesn't Exist	");
				  }}
				  
				  if(isset($_POST['reset'])){
					
					  $newpassword =$_POST['npw'];
					  $admin=$_COOKIE['user'];
					  include_once 'database.php'; 
					  $up = "UPDATE `admin` set PASSWORD='$newpassword' where USERNAME='$admin'";
					  $rs=mysqli_query($conn,$up);
					  
					  if($rs){
						  print("Password Updated.<br>");
						  ?>
						  <a href="admin.php">Click here for Admin Login</a>
						  <?php
						  
					  }else{
						  
						  print("User Exists but Password failed to update.");
				  }
					  
				  }
				  ?>
				  </form>
				  		
			  </div>
			</div>
		</div>
	</div>
	
		<div id="footer">
		<p class="footer-menu"></p>
		<p class="footer-menu">
			<a href="index.php">Home</a> | <a href="Games.php">Games</a> | <a href="Review.php">Review</a> | <a href="Cart.php">Cart</a> |<a href="Contact.php" target="_top">Contact</a>
		</p>
		<p class="footer-menu">&copy; Retro Gaming</p>
	</div><!-- end footer -->
</body>
</html>