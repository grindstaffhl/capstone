<?
	include("connection.php");
	
	$sql = "SELECT * FROM skyrim_perks";
	
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<table>";
	
	if (mysqli_num_rows($result) > 0) {
			echo "<tr><th>Perk</th><th>Rank</th><th>Description
				</th><th>ID
				</th><th>Skill Requirement
				</th><th>Perk Requirement
				</th><th>Tree</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['perk'] . 
			"</td><td>" . $row['rank'] . 
			"</td><td>" . $row['description'] .
			"</td><td>" . $row['id'] .
			"</td><td>" . $row['skill_req'] .
			"</td><td>" . $row['perk_req'] .
			"</td><td>" . $row['tree'] .
			"</td></tr>";
		}
	} else {
    		echo "0 results";
	}
	echo "</table>";
	$link->close();
?>