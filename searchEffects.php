<?php
/**
 * Created by PhpStorm.
 * User: mcpet
 * Date: 2/18/2018
 * Time: 4:05 PM
 */
    include("connection.php");

    $effects = $_GET["effectsearch"];

    $sql = "SELECT * FROM skyrim_effects WHERE effect LIKE '%".$effects."%'";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<table>"; //create html table

    if (mysqli_num_rows($result) > 0) {
        //The sql query returns something
        //create the table headings
        echo "<tr><th>Name</th><th>ID</th><th>Description
				</th><th>Extra</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            //print out all of the contents for however
            //many rows are in the database
            echo "<tr><td>" . $row['effect'] .
                "</td><td>" . $row['id'] .
                "</td><td>" . $row['description'] .
                "</td><td>" . $row['extra'] .
                "</td></tr>";
        }
    } else {
        //The sql query doesn't return anything
        echo "0 results";
    }
    echo "</table>"; //close html table

    $link->close();