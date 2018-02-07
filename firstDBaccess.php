<?php
	include("connection.php");
	
	$sql = "SELECT name, age FROM helloworld";
	
	$result = mysqli_query($mysqli_conn, $sql);
	$length = 7;
	$row = mysqli_fetch_assoc($result);

	echo "<table>";
	if (mysqli_num_rows($result) > 0) {
			echo "<tr><th>Name</th><th>Age</th></tr>";
		for ($i = 0; $i < $length; $i++) {
			echo "<tr><td>" . $row['name'] . 
			"</td><td>" . $row['age'] . 
			"</td></tr>";
			$row = mysqli_fetch_assoc($result);
		}
	} else {
    		echo "0 results";
	}
	echo "</table>";
	$mysqli_conn->close();

?>