  document.getElementById("operation").addEventListener("change", glyph_show);
 document.getElementById("btn").addEventListener("click", form_sub);
 // document.getElementById("btn").addEventListener("click", update_result);
  window.onload = get_table;
  //document.getElementById("btn").addEventListener("click", update_table);


function form_sub(){
  //submits the form to the php.
  const data = new FormData();
  const xhr = new XMLHttpRequest();

  var number1 = document.getElementById('number1').value,
  number2 = document.getElementById('number2').value,
  operation = document.getElementById('operation').value;

  var btn_btn = document.getElementById("btn");

  data.append("num1", number1);
  data.append("num2", number2);
  data.append("op", operation);
  xhr.open("POST", "calc.php", true);
  xhr.send(data);
  update_table()
  return;
}


function update_result(){
//gets back the result from the db when the form is subd.
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
  //does the same thing as update_table() but on window load.
  //var loader_get = document.getElementById("loader");
  const xhr_res = new XMLHttpRequest();
  //loader_get.style.display = "inline";

  xhr_res.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    // loader_get.style.display = "none";
     var return_table_obj = JSON.parse(this.responseText);
     var table_output  = '<tbody>'
     for(i = 0;i < return_table_obj.length; i++){
      table_output += '<tr>';
      table_output += '<td id="r_'+ return_table_obj[i].id +'">' + return_table_obj[i].id + '</td>';
      table_output += '<td>' + return_table_obj[i].operation + '</td>';
      table_output += '<td>' + return_table_obj[i].number1 + '</td>';
      table_output += '<td>' + return_table_obj[i].number2 + '</td>';
      table_output += '<td>' + return_table_obj[i].result + '</td>';
      table_output += '<td>'+'<button class="btn btn-danger" id="btn_'+ return_table_obj[i].id +'" onclick="delete_first_row(this.id)">' +'Delete this row'+ '</button>'+ '</td>';
      table_output += '<td>'+'<button class="btn btn-warning" id="btn_'+ return_table_obj[i].id +'" onclick="edit_row(this.id)">' +'Edit this row'+ '</button>'+ '</td>';
      table_output += '</tr>';
    }
    table_output +='</tbody>';
    document.getElementById('table_data').innerHTML = table_output;
   /*document.getElementById("table_delete_btn_0").addEventListener("click"delete_first_row(this.id));
   */
 }
}
xhr_res.open("GET", "db_query.php", true);
xhr_res.send();
return;
}


function update_table(id) {
  //gets 5 new entries when you sub the form.
  const xhr_res = new XMLHttpRequest();
  xhr_res.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      var return_table_obj = JSON.parse(this.responseText);
      var table_output  = '<tbody>'
      for(i = 0;i < return_table_obj.length; i++){
       table_output += '<tr>';
       table_output += '<td id="r_'+ return_table_obj[i].id +'">' + return_table_obj[i].id + '</td>';
       table_output += '<td>' + return_table_obj[i].operation + '</td>';
       table_output += '<td>' + return_table_obj[i].number1 + '</td>';
       table_output += '<td>' + return_table_obj[i].number2 + '</td>';
       table_output += '<td>' + return_table_obj[i].result + '</td>';
       //outputs the edit button that has the id of the row passed and the onclick that sets off the function that delets the row.
       table_output += '<td>'+'<button class="btn btn-danger" id="btn_'+ return_table_obj[i].id +'" onclick="delete_first_row(this.id)">' +'Delete this row'+ '</button>'+ '</td>';
       table_output += '<td>'+'<button class="btn btn-warning" id="btn_'+ return_table_obj[i].id +'" onclick="edit_row(this.id)">' +'Edit this row'+ '</button>'+ '</td>';

     }
     table_output += '</tr>';
     document.getElementById('table_data').innerHTML = table_output;

   }
   
 }
 xhr_res.open("GET", "db_query.php", true);
   xhr_res.send();
   if(!id){
  update_result();
  }
   return;
}
function glyph_show(){
// + - / between the two inputs.
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
function post_id(id){
//deletes a row using it's id, runs update_table to get a new table.
  var id_delete = id;
  const send_id = new FormData();
  const xhr = new XMLHttpRequest();
  send_id.append("id_delete",id_delete);
  xhr.open("POST", "db_query_delete.php", true);
  xhr.send(send_id);
  update_table(id);
  return;
}

function delete_first_row(btn_id){
  //passes the id into the post_id() foo
  var row_id = btn_id.split("_").pop();
 /* var animate_row = "r_" + row_id;
  console.log(animate_row);
  document.getElementById(animate_row).classList.add("bounceOut");*/
  post_id(row_id);
  return;
}

function edit_row(btn_id){
//the function that gets the data from the db.
var id_edit = btn_id.split("_").pop();
//the id of the row I want to edit^^
const xhr_res = new XMLHttpRequest();
const send_id = new FormData();
send_id.append("id_edit",id_edit);

xhr_res.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var edit_object = JSON.parse(this.responseText);
    //
    var old_btn_div = document.getElementById("update_btn");
    //set the function on click and send the id with it
     old_btn_div.innerHTML ="<button id='update_btn' class='btn btn-warning'" +
                                    " onClick='get_data_update("+edit_object[0].id+")'>" +
                                    "update</button>";
                                    
//update the inputs and the result
 document.getElementById("number1").value = edit_object[0].number1; 
document.getElementById("number2").value = edit_object[0].number2;   
document.getElementById("operation").value  = edit_object[0].operation;   
document.getElementById("output").innerHTML = "= " + edit_object[0].result; 
glyph_show();
}

}

xhr_res.open("POST", "db_query_edit.php", true);
xhr_res.send(send_id);
return;
}
function get_data_update(id){
  console.log(id);
  var n1 = document.getElementById("number1").value,
     n2 = document.getElementById("number2").value,
    op = document.getElementById("operation").value ;

  const send_data_toedit = new FormData();
  const xhr = new XMLHttpRequest();
  send_data_toedit.append("id",id);
  send_data_toedit.append("num1",n1);
  send_data_toedit.append("num2",n2);
  send_data_toedit.append("op",op);
xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
     var return_json = JSON.parse(this.responseText);
       var output = document.getElementById("output");
     var return_result = return_json[0].result;
       output.innerHTML = "= " + return_result;
     edit_db(id,n1,n2,op,return_result);
}
 }
  xhr.open("POST", "calc.php", true);
  xhr.send(send_data_toedit);

 
}
function edit_db(id,nm1,nm2,op,result){
  //edits the row in the db using the data gotten from get_data_update()
  const send_date_edit = new FormData();
  const xhr = new XMLHttpRequest();
  send_date_edit.append("id",id);
  send_date_edit.append("num1",nm1);
  send_date_edit.append("num2",nm2);
  send_date_edit.append("op",op);
  console.log(result);
  send_date_edit.append("result",result);

  xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var update_btn = document.getElementById("update_btn");
  update_btn.innerHTML = "<button id='btn' onclick='form_sub()' class='btn btn-success' >Submit</button>"
}
 }
  xhr.open("POST", "db_query_edit.php", true);
  xhr.send(send_date_edit);
  update_table(id);
}
