<?php

namespace CalculatorViaInterface\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Calculator;
use CalculatorViaInterface\Operations\Modulus;
use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Division;
use CalculatorViaInterface\Operations\Subtraction;

use CalculatorViaInterface\Operations\Multiplication;

class CalculatorTest extends TestCase
{
    public function testConstructorThrowExceptionWhenArgumentEmptyArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Empty array provided.');

        $calculator = new Calculator(new Addition());
    }

    public function testConstructorThrowExceptionWhenLessThanTwoOperands()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('You should provide 2 operand.');

        $calculator = new Calculator(new Addition(), 1);
    }

    public function testConstructorThrowExceptionWhenOperandNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Operand must be numeric.');

        $calculator = new Calculator(new Addition(), 'x', 0);
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
        $calculator = new Calculator(new Subtraction(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
        $calculator = new Calculator(new Subtraction(), 5, 2);
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
