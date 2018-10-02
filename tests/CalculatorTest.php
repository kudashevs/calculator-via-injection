<?php

namespace CalculatorViaInterface\Test;

use CalculatorViaInterface\CalculatorGenerator;
use CalculatorViaInterface\Operators\Addition;
use CalculatorViaInterface\Operators\Substraction;
use CalculatorViaInterface\Operators\Multiplication;
use CalculatorViaInterface\Operators\Division;
use CalculatorViaInterface\Operators\Modulus;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testWrongConstructorArgumentTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new CalculatorGenerator('Class', 1, 1);
    }

    public function testWrongConstructorClassTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new CalculatorGenerator(new \stdClass(), 2, 0);
    }

    public function testWrongConstructorArgumentCountException()
    {
        $this->expectException('\ArgumentCountError');
        $calculator = new CalculatorGenerator(new Addition(), 1);
    }
    
    public function testWrongFirstNumericParameterTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new CalculatorGenerator(new Addition(), 'x', 0);
    }

    public function testWrongSecondNumericParameterTypeException()
    {
        $this->expectException('\TypeError');
        $calculator = new CalculatorGenerator(new Addition(), 2, 'y');
    }

    public function testCalculateAddition()
    {
        $calculator = new CalculatorGenerator(new Addition(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
        $calculator = new CalculatorGenerator(new Addition(), 5, 2);
        $this->assertEquals(7, $calculator->calculate());
    }

    public function testCalculateSubstraction()
    {
        $calculator = new CalculatorGenerator(new Substraction(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
        $calculator = new CalculatorGenerator(new Substraction(), 5, 2);
        $this->assertEquals(3, $calculator->calculate());
    }

    public function testCalculateMultiplication()
    {
        $calculator = new CalculatorGenerator(new Multiplication(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
        $calculator = new CalculatorGenerator(new Multiplication(), 5, 2);
        $this->assertEquals(10, $calculator->calculate());
    }

    public function testCalculateDivision()
    {
        $calculator = new CalculatorGenerator(new Division(), 2, 2);
        $this->assertEquals(1, $calculator->calculate());
        $calculator = new CalculatorGenerator(new Division(), 5, 2);
        $this->assertEquals(2.5, $calculator->calculate());
    }

    public function testCalculateDivisionZeroException()
    {
        $calculator = new CalculatorGenerator(new Division(), 2, 0);
        $this->expectException('\DivisionByZeroError');
        $calculator->calculate();
    }

    public function testCalculateModulus()
    {
        $calculator = new CalculatorGenerator(new Modulus(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
        $calculator = new CalculatorGenerator(new Modulus(), 5, 2);
        $this->assertEquals(1, $calculator->calculate());
    }

    public function testCalculateModulusZeroException()
    {
        $calculator = new CalculatorGenerator(new Modulus(), 2, 0);
        $this->expectException('\DivisionByZeroError');
        $calculator->calculate();
    }
}