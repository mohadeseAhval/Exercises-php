<?php

/**
 * Excersise 1
 * Category: OOP
 * Author: Mohammad Javad Hosein Pour <mjavadhpour@gmail.com>
 */

/**
 * خوبه
 */
interface CalculatorStrategy
{
    public function doAction($f, $s);
}

/**
 * اکیه
 */
class DynamicStrategy implements CalculatorStrategy
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

/**
 * سوال: چرا این استارتژیرو امیپلمنت نکرده؟ مگه استارتژی نیست؟
 */
class TimeStrategy implements CalculatorStrategy
{
    private $equal;

    public function doAction($f, $s)
    {
        return $this->equal = $f + $s;
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
    $multiplication = new DynamicStrategy(function ($firstNumber, $secondNumber) {
        return $firstNumber * $secondNumber;
    });
    $total = new TimeStrategy();
    $object = new Calculator();
    $object->setNumbers(2, 5);
    echo $object->calculate($total);
}

main();

//"total is two number: " . $object->calculate($total) . " , " . "multiplication is two number: " . $object->calculate($multiplication);

// مثال از دو خط آخر برنامه:
// $calculator->setNumbers(2, 5);
// echo $calculator->calculate($calcStrategy);

// مثال از خروجی کنسول:
// 10