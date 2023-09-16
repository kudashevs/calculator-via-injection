<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Division();
        $operation->calculate(12, 'str');
    }

    public function testCheckThrowExceptionWhenArgumentsContainZero()
    {
        $this->expectException(\DivisionByZeroError::class);

        $operation = new Division();
        $operation->calculate(22, 0);
    }

    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Division();

        $this->assertSame(-1.2, $addition->calculate(12, -10));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Division();

        $this->assertSame($expected, $operation->calculate(...$data));
    }

    public function provideData()
    {
        return [
            'Valid integers' => [11, [22, 2]],
            'Valid floats' => [3.2758620689655173, [47.5, 14.5]],
            'Valid integer and float' => [3.0003000300030, [10, 3.333]],
        ];
    }
}
