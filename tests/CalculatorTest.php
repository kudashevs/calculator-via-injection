<?php

namespace CalculatorViaInterface\Tests;

use CalculatorViaInterface\Calculator;
use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Substraction;
use CalculatorViaInterface\Operations\Multiplication;
use CalculatorViaInterface\Operations\Division;
use CalculatorViaInterface\Operations\Modulus;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testWrongConstructorArgumentTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new Calculator('Class', 1, 1);
    }

    public function testWrongConstructorClassTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new Calculator(new \stdClass(), 2, 0);
    }

    public function testWrongConstructorArgumentCountException()
    {
        $this->expectException('\ArgumentCountError');
        $calculator = new Calculator(new Addition(), 1);
    }
    
    public function testWrongFirstNumericParameterTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new Calculator(new Addition(), 'x', 0);
    }

    public function testWrongSecondNumericParameterTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new Calculator(new Addition(), 2, 'y');
    }

    public function testCalculateAddition()
    {
        $calculator = new Calculator(new Addition(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
        $calculator = new Calculator(new Addition(), 5, 2);
        $this->assertEquals(7, $calculator->calculate());
    }

    public function testCalculateSubstraction()
    {
        $calculator = new Calculator(new Substraction(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
        $calculator = new Calculator(new Substraction(), 5, 2);
        $this->assertEquals(3, $calculator->calculate());
    }

    public function testCalculateMultiplication()
    {
        $calculator = new Calculator(new Multiplication(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
        $calculator = new Calculator(new Multiplication(), 5, 2);
        $this->assertEquals(10, $calculator->calculate());
    }

    public function testCalculateDivision()
    {
        $calculator = new Calculator(new Division(), 2, 2);
        $this->assertEquals(1, $calculator->calculate());
        $calculator = new Calculator(new Division(), 5, 2);
        $this->assertEquals(2.5, $calculator->calculate());
    }

    public function testCalculateDivisionZeroException()
    {
        $calculator = new Calculator(new Division(), 2, 0);
        $this->expectException('\DivisionByZeroError');
        $calculator->calculate();
    }

    public function testCalculateModulus()
    {
        $calculator = new Calculator(new Modulus(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
        $calculator = new Calculator(new Modulus(), 5, 2);
        $this->assertEquals(1, $calculator->calculate());
    }

    public function testCalculateModulusZeroException()
    {
        $calculator = new Calculator(new Modulus(), 2, 0);
        $this->expectException('\DivisionByZeroError');
        $calculator->calculate();
    }
}