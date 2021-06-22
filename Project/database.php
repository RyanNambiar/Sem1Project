<?php

	$dbhost = 'localhost';
	$dbuser = 'user01';
	$dbpass = 'qwerty';
	$db = 'Project';
	
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
	
	
	if(! $conn){
				
				die("Could not connect to mysql".mysql_error());
	
				}




?>