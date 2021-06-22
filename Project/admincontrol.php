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
					<a class="Login" href="Admin.php"><?php 
																session_start();
																if(isset($_SESSION['admin'])){
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
				<?php
 if(isset($_SESSION['admin'])){
					?>
			<h1>Games Table</h1>
			<?php
			include_once 'database.php';
			$sel="Select * from Games";

$rs=mysqli_query($conn,$sel);


if(mysqli_num_rows($rs)>0){
	?>
	<table cellspacing="5" cellpadding="3">
<tr rowspan="2"><th colspan="4"><big>Name</big></th><th colspan="4"><big>Date Added</big></th><th colspan="4"><big>Rating</big></th><th colspan="4"><big>Price</big></th><th colspan="4"><big>PIC1</big></th><th colspan="4"><big>PIC2</big></th><th colspan="4"><big>PIC3</big></th><th colspan="4"><big>Delete?</big></th></tr>
	
	<?php
	while($row=mysqli_fetch_array($rs)){
print("<tr rowspan=\"2\">");

print("<td colspan=\"4\">");
echo $row['GNAME'];
print("</a></td>");


print("<td colspan=\"4\">");
echo $row['DATE'];
print("</td>");


print("<td colspan=\"4\">");
echo $row['RATING'];
print("</td>");


print("<td colspan=\"4\">");
echo $row['PRICE'];
print("</td>");

print("<td colspan=\"4\">");
echo $row['PIC1'];
print("</td>");

print("<td colspan=\"4\">");
echo $row['PIC2'];
print("</td>");

print("<td colspan=\"4\">");
echo $row['PIC3'];
print("</td>");

print("<td colspan=\"4\">");
?>
<form action="admincontrol.php" method="POST">
<input type="submit" name="del" value="Delete?">
<input type="hidden" name="namedel" value="<?php echo $row['GNAME'] ?>">
</form>

<?php
print("</td></tr>");
}


print("</table>");}
else{
	print("No Data Found!");
}
			
 
 
 if(isset($_POST['del'])){
	 $gname=$_POST['namedel'];
	 
	 $del="Delete from `games` where GNAME='$gname'";
	 
	 $res=mysqli_query($conn,$del);
	 if($res){
		 print("Deleted Successfully");
			}
	 else print("Error while deleting");
 }
  
 if(isset($_POST['del2'])){
	 $tname=$_POST['tabledel2'];
	 
	 $del="Drop table `$tname`";
	 
	 $res=mysqli_query($conn,$del);
	 if($res){
		 print("Deleted Table Successfully");
			}
	 else print("Error while deleting Table");
 }
 
 print("<h1>User Tables</h1>");
 
 $sel="Show tables";

$rs=mysqli_query($conn,$sel);


if(mysqli_num_rows($rs)>0){
	?>
	<table cellspacing="5" cellpadding="3">
<tr rowspan="2"><th colspan="4"><big>User</big></th><th colspan="4"><big>Delete?</big></th></tr>

<?php
 
 while($row=mysqli_fetch_array($rs)){
print("<tr rowspan=\"2\">");

print("<td colspan=\"4\">");
if($row[0]=="admin"||$row[0]=="games"){}else{
echo $row[0];}
print("</a></td>");


print("<td colspan=\"4\">");
if($row[0]=="admin"||$row[0]=="games"){}else{
?>
<form action="admincontrol.php" method="POST">
<input type="submit" name="del2" value="Delete?">
<input type="hidden" name="tabledel2" value="<?php echo $row[0] ?>">
</form>

<?php
}
print("</td></tr>");
 
}
print("</table>");
}
 
 }else{
	 print("Not logged in");
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