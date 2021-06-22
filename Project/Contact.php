<!DOCTYPE html>

<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
	<title>Simple Black and White Template</title>
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
			<a href="index"><img class="logo" src="images/Retro.png" width="900" height="100" alt="Simple Website Templates" title="Simple Website Templates"></a>
			
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
				<div>
				  <h1>Contact</h1>
				  
				  <h2>Ryan Nambiar</h2>
				  <h2>Email : nambiarryan@gmail.com<h2>
				  
				  <h2>Karthik Mistri</h2>
				  <h2>Email : karthikdmistri@gmail.com</h2>
		
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