<?php 

interface CalculatorStrategy{
public function doAction($f, $s);
}
 class TimeStrategy implements CalculatorStrategy{ 
   private $actionClasure;

   function __construct($action) {
    $this->actionClasure = $action;
}

   public function doAction($f, $s) {
    return call_user_func($this->actionClasure, $f, $s);
   }
 }
class SumStrategy implements CalculatorStrategy{
	 public function doAction($f, $s){
		 return $f + $s;
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
$multiplication=new TimeStrategy(function ($firstNumber,$secondNumber){
return $firstNumber * $secondNumber;
});
$total=new SumStrategy();
$object=new Calculator();
$object->setNumbers(2,5);
echo "total is two number: " . $object->calculate($total) . " , " . "multiplication is two number: " . $object->calculate($multiplication);
