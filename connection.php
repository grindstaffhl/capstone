/*
	Author: Megan Petruso
	Created: 2/10/2018
	This code creates a connection to our capstone database
	in phpmyadmin.
*/
<?php

	$user = 'root';
	$password = 'root';
	$db = 'capstone';
	$host = 'localhost';
	$port = 3306;

	$link = mysqli_init();
	$success = mysqli_real_connect(
		$link, 
		$host, 
		$user, 
		$password, 
		$db,
		$port
	);
	
	if ($success->connect_error) {
    		die("Connection failed: " . $success->connect_error);
	}
?>
