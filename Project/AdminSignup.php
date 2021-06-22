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
				  <h1>Admin Sign Up</h1>
				  <form action="Signup.php" method="POST">
				  Username :<input type="text" name="user" placeholder="Enter Username"><br><br>
				  Password :<input type="password" name="pw" placeholder ="Enter Password"><br><br>
				  <input type="submit" name="sub" value="Sign-Up"><br><br>
				  <p><a href="Login.php">Click Here to Sign In</a></p>
				  <?php
				  if(isset($_POST['sub'])){
					  $user=$_POST['user'];
					  $password =$_POST['pw'];
					  include_once 'database.php';
					  $search="Select * from `$user`";
					  $rs=mysqli_query($conn,$search);
					  if(!$rs){
					  $sel = "Create table `$user`(PASSWORD varchar(20) ,GNAME varchar(20),CART varchar(20),PRICE bigint(20))";
					  $res=mysqli_query($conn,$sel);
					  $pw="Insert into `$user`(PASSWORD,GNAME,CART,PRICE) VALUES ('$password',NULL,NULL,0)";
					  
					if($res){
					//$row=mysqli_fetch_array($res);
					$res=mysqli_query($conn,$pw);
					if($pw){
					print("Sign Up Completed");
					}else{
						print("User Created Password Failed to store");
					}
				  }else{
						print("Please Sign Up Again");
				  }}
				  else{
					  print("User Already Exists");
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