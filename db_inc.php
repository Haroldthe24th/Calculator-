<?php 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "operations";

// 1. Create a database connection.
$connection = mysqli_connect($dbServername,$dbUsername ,$dbPassword);
if(!$connection){
	die("Database connection failed: " .  mysqli_connect_error());
}

// 2. Select a database to use.
$db_select = mysqli_select_db($connection, "operations");
if(!$db_select){
	 ("Database selection failed: " . mysqli_connect_error());
}


     ?>