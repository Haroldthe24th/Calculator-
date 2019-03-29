<?php 
include_once 'db_inc.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>Example of OOP</title>
</head>
<body>
<!-- The form that gets the numbers and the opertaion -->
<form action="calc.php" method="POST">
	<strong>The first number:</strong> <input type="text" name="number1">
	<br>
	<br>
	<strong>The second number:</strong><input type="text" name="number2">
	<br>
	<br>
<select name="op">
	<option value="add">Add</option>
	<option value="sub">Subtract</option>
	<option value="mul">Multiply</option>

</select>
  <input type="submit" name="Calculate">
  </form>
  <br>
  <br>
  <br>
 <table>
 	<tr>
 		<th>ID</th>
 		<th> Operation</th>
 		<th> First Number</th>
 		<th> Second Number</th>
 	    <th> Result</th>
 	</tr>
 <?php include_once("db_query.php") ?>
 </table>
<br>
<a href="db_query_full.php">See the whole list</a>
</body>
</html>