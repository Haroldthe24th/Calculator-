
	<?php  
	include_once("db_inc.php");

	include_once('calc_inc.php');

//getting the vars from the post.
    $ret = [];

	if(!(isset($_POST["id"]))){
	  $num1 = $_POST["num1"];
	  $num2 = $_POST["num2"];
	  $op = $_POST["op"];
		$opertaion = new Calc($num1, $num2, $op);
		$opertaion->math() . "<br>";
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
	} else {
	  $num1 = $_POST["num1"];
	  $num2 = $_POST["num2"];
	  $op = $_POST["op"];
		$opertaion = new Calc($num1,$num2,$op);
		$opertaion->math();
		$result = $opertaion->result;
		$obj = ["result" => $result];
		array_push($ret, $obj);
	}

  echo json_encode($ret);
	?>
