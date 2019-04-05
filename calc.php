<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
include_once("db_inc.php");

include_once('calc_inc.php');

//getting the vars from the post.

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$op = $_POST["op"];

$opertaion = new Calc($num1, $num2, $op);
echo $opertaion->math() . "<br>";
//Extracting the math function return value.
$result = $opertaion->result;

//inserting the values and 
$sql = "INSERT INTO operations (operation, number1, number2, result)
VALUES ('$op','$num1','$num2','$result')";
if ($connection->query($sql) === TRUE) {
    echo "Database updated";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}



?>
<br>
<br>
<a href="index.php"><- Go Back</a>
</body>
</html>
