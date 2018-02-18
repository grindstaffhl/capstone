<?php
/**
 * Created by PhpStorm.
 * User: mcpet
 * Date: 2/18/2018
 * Time: 4:14 PM
 */
    include("connection.php");

    $perks = $_GET["perksearch"];

    $sql = "SELECT * FROM skyrim_perks WHERE perk LIKE '%".$perks."%' OR tree LIKE '%".$perks."%'";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<table>"; //create html table

    if (mysqli_num_rows($result) > 0) {
        //The sql query returns something
        //create the table headings
        echo "<tr><th>Name</th><th>Rank</th><th>Description
				</th><th>ID
				</th><th>Skill Required
				</th><th>Perk Required
				</th><th>Tree</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            //print out all of the contents for however
            //many rows are in the database
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
        //The sql query doesn't return anything
        echo "0 results";
    }
    echo "</table>"; //close html table

    $link->close();