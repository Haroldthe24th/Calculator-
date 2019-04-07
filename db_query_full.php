<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

</head>
<body>
    <center>
        <div style="width:1100px">
	<table class="table table-bordered table-hover table-sm">
   <thead class="thead-dark">
 	<tr>
 		<th>ID</th>
 		<th> Operation</th>
 		<th> First Number</th>
 		<th> Second Number</th>
 	    <th> Result</th>
 	</tr>
 </thead>
<?php 
   include_once("db_inc.php");

 
    $sql2 = "SELECT id, operation, number1, number2, result FROM operations ORDER BY id DESC";
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
 </div>
 </center>
</body>
</html>