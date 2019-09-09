<?php 

/**
 * Excersise 1
 * Category: OOP
 * Author: Mohammad Javad Hosein Pour <mjavadhpour@gmail.com>
 */

 class CalculatorStrategy {
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
    $this->firstNumber =(int)$f;
    $this->secondNumber =(int)$s;
   }
   //$calcStrategy=function($firstNumber,$secondNumber){
	// $this->firstNumber*$this->secondNumber;
  //};
   //public function calculate(CalculatorStrategy $action){
    //return $action->doAction($this->firstNumber, $this->secondNumber);	
   //}
   public function getMultiplication(){
	   return $this->firstNumber*$this->secondNumber;
   }
 }

$object= new Calculator();
$object->setNumbers(2,5);
echo $object->getMultiplication();

// تمرین: از این کلاس های بالا طوری استفاده کن که در نهایت ضرب دو عدد در خروجی چاپ بشه

// مثال از دو خط آخر برنامه:
// $calculator->setNumbers(2, 5);
// echo $calculator->calculate($calcStrategy);

// مثال از خروجی کنسول: 
// PS C:\Users\mohammad-javad\Desktop\mohadese_exercises> php .\oop-1.php
// 10
