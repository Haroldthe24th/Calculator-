<?php 
include_once 'db_inc.php'
?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="animate.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

</head>
<body>
  <center><main>
   <h1>THE INCREDIBLE CALCULATOR</h1>
   <hr>
   <br>
   <br>
   <div class="container">
    <div class="parent">
     <div class="row">
      <div class="col-3">
      </div>
      <div class="col-sm">
       <input type="text" name="number1" id="number1" >
      <input style="display:none;" id="id_edit" >

     </div>
     <i id="glyph" class="far fa-plus-square" id="glyph"></i>
     <div class="col-sm">
       <input type="text" name="number2" id="number2">
     </div>
     <div class="col-sm">
       <strong class="float-left" id="output"></strong>
     </div>


     <div class="col-sm">
     </div>
   </div>
 </div>
 <div class="lds-ripple" id="loader_result" style="display:none"><div></div><div></div></div>

</div>

<br>
<br>
<br>
<select name="op" id="operation" >
	<option value="add">Add</option>
	<option value="sub">Subtract</option>
	<option value="mul">Multiply</option>

</select>
<strong id="update_btn">
<button  id="btn" class="btn btn-success">Submit</button>
</strong>
</div>
<br>
<br>
<br>
<div style="width:600px;">
 <table class="table table-bordered table-hover table-sm animated fadeInLeft" >
 	<thead class="thead-dark">
    <tr>
     <th>ID</th>
     <th> Operation</th>
     <th> First Number</th>
     <th> Second Number</th>
     <th> Result</th>
     <th><center>Delete Row</center></th>
     <th><center>Edit Row</center></th>
     
   </tr>
 </thead>
 <tbody id="table_data" >

 </tbody>
</table>
<div class="lds-ripple" id="loader" style="display:none;"><div></div><div></div></div>
</div>
<br>
<a href="db_query_full.php">See the whole list</a>
</main></center>
<script src="scirpt.js">
  
</script>

      </body>
      </html>