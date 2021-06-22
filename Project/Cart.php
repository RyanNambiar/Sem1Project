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
				  <h1>Cart</h1>
				<?php
				include_once 'database.php';
				if(isset($_SESSION['user'])){
				$total=0;
				$user=$_SESSION['user'];
				$sel="Select * from `$user` where PRICE>0";
	
				$rs=mysqli_query($conn,$sel);
				if($rs){
				if(mysqli_num_rows($rs)>0){
	?>
	<table cellspacing="5" cellpadding="3">
<tr rowspan="2"><th colspan="4"><big>Name</big></th><th colspan="4"><big>Price</big></th></tr>
	
	<?php
	while($row=mysqli_fetch_array($rs)){
		
		print("<tr rowspan=\"2\">");
		
		
		print("<td colspan=\"4\">");
		echo $row['CART'];
		print("</td>");
		
		print("<td colspan=\"4\">");
		$total = $total + $row['PRICE'];
		echo $row['PRICE'];
		print("</td>");
		
		print("<td colspan=\"4\">");
		?>
		<form action="Cart.php" method="POST">
		<input type="hidden" value="<?php echo $row['CART'] ?>" name="del">
		<input type="submit" value="Delete" name="delete"></form>
		<?php
				print("</td></tr>");
				}
				print("</table>");}
				if($total==0){
					print("No Items in Cart <br><br>");
				} 
				print("Total : $total <br><br>");
				
				?>
				<a href="payment.php" ><b><i>Proceed to Checkout</b></i></a>
				<?php
				}
				}
				else{
					
					print("Please Login to see Cart");
				}
				
				if(isset($_POST['delete'])){
					$namedel=$_POST['del'];
					$user=$_SESSION['user'];
					//print($namedel);
					$del="Delete  from `$user` where CART='$namedel' ";
					$res=mysqli_query($conn,$del);
					if($res){
						print("<br><br>Removed $namedel from cart");
					}else print("<br><br>Failed to remove $namedel from cart");
				}
?>				
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