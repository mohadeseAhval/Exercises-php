<?php 


interface CalculatorStrategy{
public function doAction($f, $s);
}
 class OneStrategy implements CalculatorStrategy{ 
   private $actionClasure;

   function __construct($action) {
    $this->actionClasure = $action;
}

   public function doAction($f, $s) {
    return call_user_func($this->actionClasure, $f, $s);
   }
 }

 class Calculator {
   private $firstNumber;
   private $secondNumber;

   public function setNumbers($f, $s) {
    $this->firstNumber = $f;
    $this->secondNumber = $s;
   }

   public function calculate(CalculatorStrategy $action) {
    return $action->doAction($this->firstNumber, $this->secondNumber);
   }
 }
$multiplication=new OneStrategy(function ($firstNumber,$secondNumber){
return $firstNumber * $secondNumber;
});
$object=new Calculator();
$object->setNumbers(2,5);
echo $object->calculate($multiplication);
