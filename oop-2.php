<?php 

/**
 * Excersise 1
 * Category: OOP
 * Author: Mohammad Javad Hosein Pour <mjavadhpour@gmail.com>
 */
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



// تمرین: از این کلاس های بالا طوری استفاده کن که در نهایت ضرب دو عدد در خروجی چاپ بشه

// مثال از دو خط آخر برنامه:
// $calculator->setNumbers(2, 5);
// echo $calculator->calculate($calcStrategy);

// مثال از خروجی کنسول: 
// 10
