<?php

namespace CalculatorViaInterface\Tests;

use CalculatorViaInterface\Calculator;
use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Subtraction;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function it_can_throw_an_exception_when_no_arguments_are_provided()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('at least');

        $addition = new Calculator(new Addition());
        $addition->calculate();
    }

    /** @test */
    public function it_can_throw_an_exception_when_an_argument_with_a_wrong_type()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('numeric');

        $subtraction = new Calculator(new Subtraction());
        $subtraction->calculate(42, 'wrong');
    }

    /** @test */
    public function it_can_perform_an_addition()
    {
        $addition = new Calculator(new Addition());
        $result = $addition->calculate(2, 3, 4);

        $this->assertSame(9, $result);
    }

    /** @test */
    public function it_uses_an_operation_when_it_performs_calculations()
    {
        // This test seems to be redundant and sort of white box testing,
        // however, I'd like to keep it here for the educational purposes
        $additionMock = $this->createMock(Addition::class);
        $additionMock->expects($this->once())
            ->method('calculate')
            ->with(
                $this->equalTo(2),
                $this->equalTo(3),
                $this->equalTo(4),
            )
            ->willReturn(9);

        $addition = new Calculator($additionMock);
        $result = $addition->calculate(2, 3, 4);

        $this->assertEquals(9, $result);
    }
}
