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
<select name="op" id="operation" class="selectpicker">
	<option value="add">Add</option>
	<option value="sub">Subtract</option>
	<option value="mul">Multiply</option>

</select>
  <input type="submit" id="btn" class="btn btn-warning" name="Calculate">
  </div>
  <br>
  <br>
  <br>
  <div style="width:600px;">
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
 	<tbody id="table_data">
 		
 	</tbody>
 </table>
 <div class="lds-ripple" id="loader" style="display:none;"><div></div><div></div></div>
 </div>
<br>
<a href="db_query_full.php">See the whole list</a>
</main></center>
<script>
  
document.getElementById("operation").addEventListener("change", glyph_show);
document.getElementById("btn").addEventListener("click", form_sub);
document.getElementById("btn").addEventListener("click", update_result);
window.onload = get_table;
document.getElementById("btn").addEventListener("click", update_table);

function form_sub(){
  //submits the form to the php.
const data = new FormData();
const xhr = new XMLHttpRequest();

var number1 = document.getElementById('number1').value,
    number2 = document.getElementById('number2').value,
    operation = document.getElementById('operation').value;


     data.append("num1", number1);
     data.append("num2", number2);
     data.append("op", operation);

      xhr.open("POST", "calc.php", true);
      xhr.send(data);
return;
}


 function update_result(){
//gets back the result from the db.
      var output = document.getElementById("output");
     var loader_result = document.getElementById("loader_result");
               output.innerHTML =  "";
             loader_result.style.display = "";
        const xhr_res = new XMLHttpRequest();
         xhr_res.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              loader_result.style.display = "none";
               let result = this.responseText;
               output.innerHTML =  "=  " + result;
           }
       }
        xhr_res.open("GET", "db_query_result.php", true);
        xhr_res.send();
        return;
    }
    function get_table() {
      var loader_get = document.getElementById("loader");
        const xhr_res = new XMLHttpRequest();
              loader_get.style.display = "inline";

         xhr_res.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               loader_get.style.display = "none";
              var return_table_obj = JSON.parse(this.responseText);
              var table_output  = '<tbody>'
    for(i = 0;i < return_table_obj.length; i++){
        table_output += '<tr>';
 table_output += '<td id="table_row_id_'+ i +'">' + return_table_obj[i].id + '</td>' + '<button id="table_delete_btn_'+ i +'">' + '</button>';        table_output += '<td>' + return_table_obj[i].operation + '</td>';
        table_output += '<td>' + return_table_obj[i].number1 + '</td>';
        table_output += '<td>' + return_table_obj[i].number2 + '</td>';
        table_output += '<td>' + return_table_obj[i].result + '</td>';
        table_output += '</tr>';
    }
    table_output +='</tbody>';
    document.getElementById('table_data').innerHTML = table_output;
    document.getElementById("table_delete_btn_0").addEventListener("click", delete_first_row);
           }
       }
        xhr_res.open("GET", "db_query.php", true);
        xhr_res.send();
      return;
    }
     function update_table() {
        const xhr_res = new XMLHttpRequest();
         xhr_res.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              var return_table_obj = JSON.parse(this.responseText);
              var table_output  = '<tbody>'
    for(i = 0;i < return_table_obj.length; i++){
        table_output += '<tr>';
        table_output += '<td id="table_row_id_'+ i +'">' + return_table_obj[i].id + '</td>' + '<button id="table_delete_btn_'+ i +'">' + '</button>';
        table_output += '<td>' + return_table_obj[i].operation + '</td>';
        table_output += '<td>' + return_table_obj[i].number1 + '</td>';
        table_output += '<td>' + return_table_obj[i].number2 + '</td>';
        table_output += '<td>' + return_table_obj[i].result + '</td>';
        table_output += '</tr>';
    }
    table_output +='</tbody>';
    document.getElementById('table_data').innerHTML = table_output;
     document.getElementById("table_delete_btn_0").addEventListener("click", delete_first_row);


           }
       }
        xhr_res.open("GET", "db_query.php", true);
        xhr_res.send();
      return;
    }
function glyph_show(){

  let select = document.getElementById("operation").value;
  let i_element = document.getElementById("glyph");
  i_element.className = "";
      if(select == "sub"){
      i_element.classList.add("far","fa-minus-square");
      } else if(select == "mul"){
              i_element.classList.add("far","fa-times-circle");

      } else if(select == "add"){
       i_element.classList.add("far","fa-plus-square");
      }
  return;
}

function delete_first_row(){
var id_delete = document.getElementById("table_row_id_0").innerHTML;
console.log(id_delete);
const id = new FormData();
const xhr = new XMLHttpRequest();
      id.append("id_delete",id_delete);
      xhr.open("POST", "db_query_delete.php", true);
      xhr.send(id);
      update_table();
      return;
}


  /* let result = this.responseText;
               output.innerHTML = "The result is: " + result;*/
 /*  if (this.readyState == 4 && this.status == 200) {
          let begin_arr = "[",
                end_arr = "];";

          let arrays = begin_arr + this.responseText + end_arr;
          let string_array = JSON.stringify(arrays);
          let index = string_array.lastIndexOf(",");
          let string_array_split = string_array.split("");
            string_array_split.splice(index,1,"");
            string_array_split = string_array_split.join("");
          let final_array = JSON.parse(string_array_split);
          console.log(final_array);
          let final_array_before_last = "'"+ final_array + "'";
          console.log(final_array_before_last);
          let final_array_last = JSON.parse(final_array_before_last);

           console.log(final_array_last);*/


</script>

</body>
</html>