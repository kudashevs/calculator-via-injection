<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Subtraction;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Subtraction();
        $operation->handle(12, 'str');
    }

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Subtraction();

        $this->assertSame(32, $addition->handle(12, -20));
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Subtraction();

        $this->assertSame($expected, $operation->handle(...$data));
    }

    public function provideData()
    {
        return [
            'Valid integers' => [10, [22, 12]],
            'Valid floats' => [-2.225, [1.5, 3.725]],
            'Valid integer and float' => [60.5, [102.5, 42]],
        ];
    }
}
