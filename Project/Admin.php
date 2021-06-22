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
<?php  ?>

	
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
				<?php 
				
				if(!isset($_SESSION['admin'])){
						
						
						?>
						
				  <h1>Admin Login</h1>
				  <form action="Admin.php" method="POST">
				  Username :<input type="text" name="admin" placeholder="Enter Username"><br><br>
				  Password :<input type="password" name="pw" placeholder ="Enter Password"><br><br>
				  <input type="submit" name="sub" value="Sign-In"><br><br>
				  <a href="AdminForgotpw.php">Forgot password?</a><br><br>
				  <a href="Login.php">For User Login Click Here</a>
				  
				  <?php
				  if(isset($_POST['sub'])){
					  $admin=$_POST['admin'];
					  $password =$_POST['pw'];
					  include_once 'database.php';
					  $sel = "SELECT * FROM `admin` WHERE PASSWORD='$password'";
					  $res=mysqli_query($conn,$sel);
					  
					if(mysqli_num_rows($res)>0){
					//$row=mysqli_fetch_array($res);
					print("Welcome $admin");
					
					$_SESSION['admin']=$admin;
					//$chk=$_SESSION['user'];
					//  print("$chk");
				  }else{
					  $admin=$_POST['admin'];
						print("<br>Incorrect Username or Password");
				  }}
				  
				  
				}else{
					$admin=$_SESSION['admin'];
					print("$admin is currently logged in<br><br>");
					?>
					<a href="admincontrol.php">Click here for Master Control</a><br><br>
					<form action="Admin.php" method="POST">
					<input type="submit" name="logout" value="Logout">
					</form>
					<?php
				}
				
				if(isset($_POST['logout'])){
					unset($_SESSION['admin']);
					
					
				}
				print("<br><br>");
				
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
	</div> end footer -->
</body>
</html>