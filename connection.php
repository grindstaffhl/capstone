<?php
	$servername = "localhost";
	$dbname = "test";

	$mysqli_conn = new mysqli($servername, $dbname);
	if ($mysqli_conn->connect_error) {
    		die("Connection failed: " . $mysqli_conn->connect_error);
	}
?>
