<?php 
   include_once("db_inc.php");
    $id = $_POST["id_delete"];
    if(isset($id)){
       echo $id;
    $sql_query = "DELETE FROM operations WHERE id=$id";
    $delete_query = $connection->query($sql_query);
}
    

     ?>

