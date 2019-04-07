  
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
        table_output += '<td id="table_row_id">' + return_table_obj[i].id + '</td>';
        table_output += '<td>' + return_table_obj[i].operation + '</td>';
        table_output += '<td>' + return_table_obj[i].number1 + '</td>';
        table_output += '<td>' + return_table_obj[i].number2 + '</td>';
        table_output += '<td>' + return_table_obj[i].result + '</td>';
        table_output += '</tr>';
    }
    table_output +='</tbody>';
    document.getElementById('table_data').innerHTML = table_output;
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
        table_output += "<td id='table_id "+ i"'>" + return_table_obj[i].id + '</td>';
        table_output += '<td>' + return_table_obj[i].operation + '</td>';
        table_output += '<td>' + return_table_obj[i].number1 + '</td>';
        table_output += '<td>' + return_table_obj[i].number2 + '</td>';
        table_output += '<td>' + return_table_obj[i].result + '</td>';
        table_output += '</tr>';
    }
    table_output +='</tbody>';
    document.getElementById('table_data').innerHTML = table_output;
           }
       }
        xhr_res.open("GET", "db_query.php", true);
        xhr_res.send();
      return;
    }
    console.log("1")
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

