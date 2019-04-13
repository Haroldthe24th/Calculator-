<?php 
class Calc {
   
   public $num1;
   public $num2;
   public $op;
   public $result;

public function __construct($num1, $num2, $op){//it's double underscore construct not __constructor
    
    $this->num1 = $num1;
    $this->num2 = $num2;
    $this->op = $op;
}

public function math(){

   switch($this->op){
      case "add":
      $result =  $this->num1 + $this->num2;
      break;
      case "sub":
      $result = $this->num1 - $this->num2;
      break;
      case "mul":
      $result =  $this->num1 * $this->num2;
      break;
      default:
      $result = "error";
      break;
   }
    $this->result = $result;//without this the result doesn't get set to $result and isn't accessable from outside, it only returns when the function is called.
   return $result;
}

}


?>