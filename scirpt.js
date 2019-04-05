
document.getElementById("operation").addEventListener("change", glyph_show);
document.getElementById("btn").addEventListener("click", form_sub);
document.getElementById("btn").addEventListener("click", update_result);


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
        const xhr_res = new XMLHttpRequest();
         xhr_res.onreadystatechange = function() {
         	  if (this.readyState == 4 && this.status == 200) {
               let result = this.responseText;
               output.innerHTML = "Result: " + result;
           }
       }
        xhr_res.open("GET", "db_query_result.php", true);
        xhr_res.send();
        return;
    }
function glyph_show(){

	let select = document.getElementById("operation").value;
	let i_element = document.getElementById("glyph");
	i_element.className = "";
      console.log(select);
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

