<?php
abstract class CalculatorStrategyFactory
{
    abstract public function getStrategy(): CalculatorStrategy;    
   
}
class TimeStrategyFactory extends CalculatorStrategyFactory
{   
    public function getStrategy(): CalculatorStrategy
    {      
            return new TimeStrategy(function ($firstNumber, $secondNumber) {
                return $firstNumber * $secondNumber;
            });
    }
}
class SumStrategyFactory extends CalculatorStrategyFactory
{   
    public function getStrategy(): CalculatorStrategy
    {       
        return new SumStrategy();
    }
}
interface CalculatorStrategy
{
    public function doAction($f, $s);
}
class TimeStrategy implements CalculatorStrategy
{
    private $actionClasure;

    function __construct($action)
    {
        $this->actionClasure = $action;
    }

    public function doAction($f, $s)
    {
        return call_user_func($this->actionClasure, $f, $s);
    }
}
class SumStrategy implements CalculatorStrategy
{
    public function doAction($f, $s)
    {
        return  $f + $s;
    }
}

//calculator
 class CalculatorFactory
{
    public function getCalculator(): Calculator
    {
        return new Calculator();
    }  
}

class Calculator
{
    private $firstNumber;
    private $secondNumber;

    public function setNumbers($f, $s)
    {
        $this->firstNumber = $f;
        $this->secondNumber = $s;
    }


    public function calculate()
    {
        if (func_num_args() == 0)
        {
            return $this->calculateWithoutStrategy();
        }

        if (func_num_args() == 1) {
            if (func_get_arg(0) instanceof CalculatorStrategy)
            {
                return $this->calculateWithStrategy(func_get_arg(0));
            }
        }

        throw new Exception('Method is not found!');
    }

    private function calculateWithoutStrategy()
    {
        return "my";
    }

    private function calculateWithStrategy(CalculatorStrategy $action)
    {
        return $action->doAction($this->firstNumber, $this->secondNumber);
    }
}


function main()
{
    
    $timeSFactory = new TimeStrategyFactory();
    $timeStrategy=$timeSFactory->getStrategy();

    $totalSFactory = new SumStrategyFactory();
    $totalStrategy=$totalSFactory->getStrategy();
   
    $calculatorFactory = new CalculatorFactory();
    $calculatorObject=$calculatorFactory->getCalculator();
    $calculatorObject->setNumbers(2,5);
    echo $calculatorObject->calculate($totalStrategy);
}

main();

?>