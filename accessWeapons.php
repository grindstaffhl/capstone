<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_weapons";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>";
	
	if (mysqli_num_rows($result) > 0) {
			echo "<tr><th>Name</th><th>Damage</th><th>Weight
				</th><th>Price
				</th><th>ID
				</th><th>Type</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['name'] . 
			"</td><td>" . $row['damage'] . 
			"</td><td>" . $row['weight'] .
			"</td><td>" . $row['price'] .
			"</td><td>" . $row['id'] .
			"</td><td>" . $row['type'] .
			"</td></tr>";
		}
	} else {
    		echo "0 results";
	}
	echo "</table>";
	$link->close();
?>