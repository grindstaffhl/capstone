/*
	Author: Megan Petruso
	Created: 2/10/2018
	This code displays all of the contents of the skyrim_perks table 
	in our capstone database on phpmyadmin.
*/
<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_perks";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>"; //create html table
	
	if (mysqli_num_rows($result) > 0) {
		//The sql query returns something
		//create table headers
			echo "<tr><th>Perk</th><th>Rank</th><th>Description
				</th><th>ID
				</th><th>Skill Requirement
				</th><th>Perk Requirement
				</th><th>Tree</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			//print out all contents of each row in the database
			echo "<tr><td>" . $row['perk'] . 
			"</td><td>" . $row['rank'] . 
			"</td><td>" . $row['description'] .
			"</td><td>" . $row['id'] .
			"</td><td>" . $row['skill_req'] .
			"</td><td>" . $row['perk_req'] .
			"</td><td>" . $row['tree'] .
			"</td></tr>";
		}
	} else { //The sql query does not return anything
    		echo "0 results";
	}
	echo "</table>"; //close html table
	$link->close();
?>