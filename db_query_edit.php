<?php 
   include_once("db_inc.php");
    $ret_ar = [];
    if(isset($_POST["id_edit"])){
    $id = $_POST["id_edit"];
    $sql_query = "SELECT * FROM operations WHERE id=$id";
    $get_edit_query = $connection->query($sql_query);
    $return_array = $get_edit_query->fetch_assoc();
    if(count($return_array) > 0){
    	$elements = ["id" => $return_array["id"],"operation" => $return_array["operation"],"number1" => $return_array["number1"],"number2" => $return_array["number2"], "result" => $return_array["result"]];;
    	array_push($ret_ar, $elements);
    };
  echo json_encode($ret_ar);

} else if(isset($_POST["result"])){
    $id = $_POST["id"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $op = $_POST["op"];
    $res = $_POST["result"];
   

   $sql_query2 = "UPDATE operations SET operation ='{$op}',number1 = {$num1},number2={$num2}, result={$res} WHERE id={$id}";
   $edit_query = $connection->query($sql_query2);
   if ($connection->query($sql_query2) === TRUE) {
			echo "Database updated";
		} else {
			echo "Error: " . $sql_query2 . "<br>" . $connection->error;
		}

}

    

     ?>

