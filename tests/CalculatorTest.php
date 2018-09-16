<?php

namespace CalculatorViaInterface;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testWrongParametersException()
    {
        $this->expectException('TypeError');
        $calculator = new CalculatorGenerator(new \stdClass(), 2, 0);
        $this->expectException('TypeError');
        $calculator = new CalculatorGenerator(new Addition(), 'x', 0);
        $this->expectException('TypeError');
        $calculator = new CalculatorGenerator(new Addition(), 2, 'y');
    }

    public function testCalculateAddition()
    {
        $calculator = new CalculatorGenerator(new Addition(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
    }

    public function testCalculateSubstraction()
    {
        $calculator = new CalculatorGenerator(new Substraction(), 2, 2);
        $this->assertEquals(0, $calculator->calculate());
    }

    public function testCalculateMultiplication()
    {
        $calculator = new CalculatorGenerator(new Multiplication(), 2, 2);
        $this->assertEquals(4, $calculator->calculate());
    }

    public function testCalculateDivision()
    {
        $calculator = new CalculatorGenerator(new Division(), 2, 2);
        $this->assertEquals(1, $calculator->calculate());
    }

    public function testCalculateZeroEception()
    {
        $calculator = new CalculatorGenerator(new Division(), 2, 0);
        $this->expectException('DivisionByZeroError');
        $calculator->calculate();
    }

}