<?php 

/**
 * Excersise 1
 * Category: OOP
 * Author: Mohammad Javad Hosein Pour <mjavadhpour@gmail.com>
 */
interface CalculatorStrategy{
public function doAction($f, $s);
}
 class DynamicStrategy implements CalculatorStrategy{ 
   private $actionClasure;

   function __construct($action) {
    $this->actionClasure = $action;
}

   public function doAction($f, $s) {
    return call_user_func($this->actionClasure, $f, $s);
   }
 }
class TimeStrategy implements CalculatorStrategy{
	private $equal;
	 public function doAction($f, $s){
		 return $this->equal= $f + $s;
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
$multiplication=new DynamicStrategy(function ($firstNumber,$secondNumber){
return $firstNumber * $secondNumber;
});
$total=new TimeStrategy();
$object=new Calculator();
$object->setNumbers(2,5);
echo "total is two number: " . $object->calculate($total) . " , " . "multiplication is two number: " . $object->calculate($multiplication);


// مثال از دو خط آخر برنامه:
// $calculator->setNumbers(2, 5);
// echo $calculator->calculate($calcStrategy);

// مثال از خروجی کنسول: 
// 10
