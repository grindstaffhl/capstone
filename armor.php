/*
	Author: Megan Petruso
	Created: 2/10/2018
	This code displays all of the contents of the skyrim_armor table 
	in our capstone database on phpmyadmin.
*/
<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_armor";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>"; //create html table
	
	if (mysqli_num_rows($result) > 0) {
		//The sql query returns something
		//create the table headers
			echo "<tr><th>Name</th><th>Defense</th><th>Weight
				</th><th>Price
				</th><th>ID
				</th><th>Type</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			//print out all of the row contents for each row
			//in the database
			echo "<tr><td>" . $row['name'] . 
			"</td><td>" . $row['defense'] . 
			"</td><td>" . $row['weight'] .
			"</td><td>" . $row['price'] .
			"</td><td>" . $row['id'] .
			"</td><td>" . $row['type'] .
			"</td></tr>";
		}
	} else {
		//sql query does not return anything
    		echo "0 results";
	}
	echo "</table>"; //close html table
	$link->close();
?>