<?php
/**
 * Created by PhpStorm.
 * User: mcpet
 * Date: 2/17/2018
 * Time: 4:58 PM
 */
    include("connection.php");

    $wpnarmr = $_GET["wpnarmrsearch"];

    $sql = "SELECT * FROM skyrim_weapons_armor WHERE name LIKE '%".$wpnarmr."%' OR type LIKE '%".$wpnarmr."%'";
    //$sql .= "SELECT * FROM skyrim_weapons_armor WHERE type LIKE '%".$wpnarmr."%'";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<table>"; //create html table

    if (mysqli_num_rows($result) > 0) {
        //The sql query returns something
        //create the table headings
        echo "<tr><th>Name</th><th>Rating</th><th>Weight
				</th><th>Price
				</th><th>ID
				</th><th>Type</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            //print out all of the contents for however
            //many rows are in the database
            echo "<tr><td>" . $row['name'] .
                "</td><td>" . $row['rating'] .
                "</td><td>" . $row['weight'] .
                "</td><td>" . $row['price'] .
                "</td><td>" . $row['id'] .
                "</td><td>" . $row['type'] .
                "</td></tr>";
        }
    } else {
        //The sql query doesn't return anything
        echo "0 results";
    }
    echo "</table>"; //close html table

    $link->close();