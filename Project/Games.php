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
				  <h1>Games</h1>
					

<form method="POST" action="Games.php">
Search : <input type="text" name="search">&nbsp&nbsp&nbsp
<input type="submit" name="sub" value="GO!">
</form>
<?php 
include_once 'database.php';
if(isset($_POST['sub'])){
	$search=$_POST['search'];
	$sel="Select * from Games where GNAME='$search'";

$res=mysqli_query($conn,$sel);
$row=mysqli_fetch_array($res);
if($row>0){
?>

<table cellspacing="5" cellpadding="3">
<tr rowspan="2"><th colspan="4"><big>Name</big></th><th colspan="4"><big>Date Added</big></th><th colspan="4"><big>Rating</big></th><th colspan="4"><big>Price</big></th></tr>
<tr rowspan="2"><td colspan="4"><a href="Game_Temp.php?id=<?php echo $row['GNAME'] ?>"><?php echo $row['GNAME'] ?></td><td colspan="4"><?php echo $row['DATE'] ?></td><td colspan="4"><?php echo $row['RATING'] ?></td><td colspan="4"><?php if($row['PRICE']==0){print("Free to Play");}else echo $row['PRICE'] ?></td></tr>
</table>
<?php

}else
	print("<br>No Data Found");
	
}
else{
?>
<!--<text>Sort By :</text><select name="sort">
<option name="da">Date Added</option>
<option name="n">Newest</option>
<option name="o">Oldest</option>

</select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->
<?php

$sel="Select * from Games";

$rs=mysqli_query($conn,$sel);


if(mysqli_num_rows($rs)>0){
	?>
	<table cellspacing="5" cellpadding="3">
<tr rowspan="2"><th colspan="4"><big>Name</big></th><th colspan="4"><big>Date Added</big></th><th colspan="4"><big>Rating</big></th><th colspan="4"><big>Price</big></th></tr>
	
	<?php
	while($row=mysqli_fetch_array($rs)){
print("<tr rowspan=\"2\">");

print("<td colspan=\"4\">");
?>
<a href="Game_Temp.php?id=<?php echo $row['GNAME']; ?>">
<?php
echo $row['GNAME'];

print("</a></td>");


print("<td colspan=\"4\">");
echo $row['DATE'];
print("</td>");


print("<td colspan=\"4\">");

echo $row['RATING'];
print("</td>");


print("<td colspan=\"4\">");
if($row['PRICE']==0){
	print("Free to Play");
}else
echo $row['PRICE'];
print("</td></tr>");

}
print("</table>");}
else{
	print("No Data Found!");
}
}
?>
				
			  </div>
			</div>
		</div>
	</div>
	<!---->
	<div id="footer">
		<p class="footer-menu"></p>
		<p class="footer-menu">
			<a href="index.php">Home</a> | <a href="Games.php">Games</a> | <a href="Review.php">Review</a> | <a href="Cart.php">Cart</a> |<a href="Contact.php" target="_top">Contact</a>
		</p>
		<p class="footer-menu">&copy; Retro Gaming</p>
	</div>
</body>
</html>