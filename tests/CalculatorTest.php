<?php

namespace CalculatorViaInterface\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Calculator;
use CalculatorViaInterface\Operations\Addition;

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

    public function testOperableWorksAsExpectedWhenMock()
    {
        $mock = $this->getMockBuilder(Addition::class)
            ->setMethods(['check', 'handle'])
            ->getMock();
        $mock->expects($this->once())
            ->method('handle')
            ->with(
                $this->equalTo(2),
                $this->equalTo(2)
            )
            ->willReturn(4);

        $calc = new Calculator($mock, 2, 2);
        $this->assertEquals(4, $calc->calculate());
    }
}
