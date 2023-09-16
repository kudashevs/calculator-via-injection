<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Multiplication;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Multiplication();
        $operation->calculate(12, 'str');
    }

    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Multiplication();

        $this->assertSame(-240, $addition->calculate(12, -20));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Multiplication();

        $this->assertSame($expected, $operation->calculate(...$data));
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
