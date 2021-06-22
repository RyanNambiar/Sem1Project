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
				<div>
				 <!-- <h1></h1>-->
				 
				  <?php
				  
					  include_once 'database.php';
						$name=$_GET['name'];
						$sel = "SELECT * FROM Games where GNAME='$name'";
						$res=mysqli_query($conn,$sel);
						$user=$_SESSION['user'];
					  $row=mysqli_fetch_array($res);
					  $price=$row['PRICE'];
					  //$ins = "Insert into `$user` GNAME='$name' where PASSWORD='$pw'";
					  $Gname=$row['GNAME'];
					  
					if($price==0 && isset($_SESSION['user'])){
						$sel="Select * from `$user` where GNAME='$Gname'";
						$rs=mysqli_query($conn,$sel);
						if(mysqli_num_rows($rs)>0){
						print("Already Added for Review <br><br>");	
						}else{
						$ins="Insert into `$user`(GNAME) Values ('$Gname')";
						//print("$Gname $user");
						$res=mysqli_query($conn,$ins);
						if($res){
							print("Added for review <br><br>");
						}}
						
						?>
						<a href="<?php echo $Gname ?>.exe">Click Here to Download</a>
						<?php
					}
					else if($price>0 && isset($_SESSION['user'])){
						$user=$_SESSION['user'];
						$sel="Select * from `$user` where CART='$Gname'";
						$search=mysqli_query($conn,$sel);
						if(!mysqli_num_rows($search)>0){
						$add="Insert into `$user` (CART,PRICE) values('$Gname','$price') ";
						$addres=mysqli_query($conn,$add);
						if($addres){
						
						print("<h2>Added to cart</h2>");
						}else
							print("Incurred an error");
					}else{
						print("<h2>Already Added to Cart</h2>");
					}
					}else{
						
					print("Please Login to Continue");	
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