<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
 	<tr>
 		<th>ID</th>
 		<th> Operation</th>
 		<th> First Number</th>
 		<th> Second Number</th>
 	    <th> Result</th>
 	</tr>
<?php 
   include_once("db_inc.php");

 
    $sql2 = "SELECT id, operation, number1, number2, result FROM operations";
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
     ?>
 </table>
</body>
</html>