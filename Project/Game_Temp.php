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
				</li>
				<li>
					<a href="Contact.php" target="_top">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div id="content">
		<?php
		include_once 'database.php';
$Gamename=$_GET['id'];

$sel="Select * from Games where GNAME='$Gamename'";

$res=mysqli_query($conn,$sel);
$row=mysqli_fetch_array($res);

		?>
			<div>
				<div>
				  <h1><?php echo $row['GNAME'] ?></h1>
				<h2>Title : <?php echo $row['GNAME'] ?></h2>
				<h2>Description : <?php echo $row['DESCRIPTION'] ?></h2>
				<h2>Date Added : <?php echo $row['DATE'] ?> </h2>
				<h2>Price : <?php if($row['PRICE']==0){ 
													print("Free to play ");
														}else{
															echo $row['PRICE'];
														}?> </h2>
				<h2>ScreenShots : </h2>
				<marquee onmouseover="this.stop();" onmouseout="this.start();">	<img src="<?php echo $row['PIC1'] ?>" alt="<?php echo $row['GNAME'] ?>" width="450" height="450" title="<?php echo $row['GNAME'] ?>" hspace="20" vspace="20" align="middle">
								<img src="<?php echo $row['PIC2'] ?>" hspace="20" vspace="20" width="450" height="450" align="middle" alt="<?php echo $row['GNAME'] ?>" title="<?php echo $row['GNAME'] ?>">
								<img src="<?php echo $row['PIC3'] ?>" hspace="20" vspace="20" width="450" height="450" align="middle" alt="<?php echo $row['GNAME'] ?>" title="<?php echo $row['GNAME'] ?>"> </marquee>
					<br>
					<h2>Download Link :</h2>
					<a href="download.php?name=<?php echo$row['GNAME']; ?>"  ><u><big>Download Here</big></u></a>
						<h2>Reviews : </h2>
						<p><?php echo $row['RATING'] ?>/5</p>
			
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
	</div><!-- end footer 
</body>
</html>