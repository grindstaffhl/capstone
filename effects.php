<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_effects";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>";
	
	if (mysqli_num_rows($result) > 0) {
			echo "<tr><th>Effect</th><th>ID
				</th><th>Description
				</th><th>Notes</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['effect'] . 
			"</td><td>" . $row['id'] . 
			"</td><td>" . $row['description'] .
			"</td><td>" . $row['extra'] .
			"</td></tr>";
		}
	} else {
    		echo "0 results";
	}
	echo "</table>";
	$link->close();
?>