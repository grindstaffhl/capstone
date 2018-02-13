<?php

	$user = 'root';
	$password = 'root';
	$db = 'test';
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
