/*
	Author: Megan Petruso
	Created: 2/10/2018
	This code displays all of the contents of the skyrim_effects table 
	in our capstone database on phpmyadmin.
*/
<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_effects";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>"; //create html table
	
	if (mysqli_num_rows($result) > 0) {
		//The sql query returns something
		//create the table headers
			echo "<tr><th>Effect</th><th>ID
				</th><th>Description
				</th><th>Notes</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			//print out all contents of each row in the database
			echo "<tr><td>" . $row['effect'] . 
			"</td><td>" . $row['id'] . 
			"</td><td>" . $row['description'] .
			"</td><td>" . $row['extra'] .
			"</td></tr>";
		}
	} else {
		//The query does not return anything
    		echo "0 results";
	}
	echo "</table>"; //close html table
	$link->close();
?>