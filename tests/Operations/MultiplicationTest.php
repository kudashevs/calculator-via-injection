<?php

namespace CalculatorViaInterface\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Operations\Multiplication;

class MultiplicationTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Multiplication();
        $operation->handle(12, 'str');
    }

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Multiplication();

        $this->assertSame(-240, $addition->handle(12, -20));
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Multiplication();

        $this->assertSame($expected, $operation->handle(...$data));
    }

    public function provideData()
    {
        return [
            'When contains zero' => [0, [12, 0]],
            'Valid integers' => [110, [22, 5]],
            'Valid floats' => [28.0, [3.5, 8]],
            'Valid integer and float' => [5.5, [2.75, 2]],
        ];
    }
}
