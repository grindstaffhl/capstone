<?php
	include("firstConnection.php");
	
	$sql = "SELECT * FROM helloworld";
	
	$result = mysqli_query($link, $sql);
	$length =10;
	$row = mysqli_fetch_assoc($result);

	echo "<table>";
	
	if (mysqli_num_rows($result) > 0) {
			echo "<tr><th>Name</th><th>Age</th><th>Color</th><th>Animal</th></tr>";
		for ($i = 0; $i < $length; $i++) {
			echo "<tr><td>" . $row['name'] . 
			"</td><td>" . $row['age'] . 
			"</td><td>" . $row['color'] .
			"</td><td>" . $row['animal'] .
			"</td></tr>";
			$row = mysqli_fetch_assoc($result);
		}
	} else {
    		echo "0 results";
	}
	echo "</table>";
	$link->close();

?>