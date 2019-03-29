<?php 
   include_once("db_inc.php");

 
    $sql2 = "SELECT id, operation, number1, number2, result FROM operations Order BY id DESC LIMIT 5";
    $result_query = $connection->query($sql2);

if ($result_query->num_rows > 0) {
    // output data of each row
    while($row = $result_query->fetch_assoc()) {
    	echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["operation"] . "</td>";
        echo "<td>" . $row["number1"] . "</td>";
        echo "<td>" . $row["number2"]  . "</td>";
        echo "<td>" . $row["result"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$connection->close();


/*

while($row = $result_query->fetch_assoc()) {
    	echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["operation"] . "</td>";
        echo "<td>" . $row["number1"] . "</td>";
        echo "<td>" . $row["number2"]  . "</td>";
        echo "<td>" . $row["result"] . "</td>";
        echo "</tr>";

    */


     ?>

