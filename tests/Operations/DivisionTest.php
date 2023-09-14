<?php

namespace CalculatorViaInterface\Tests\Operations;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Operations\Division;

class DivisionTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Division();
        $operation->handle(12, 'str');
    }

    public function testCheckThrowExceptionWhenArgumentsContainZero()
    {
        $this->expectException(\DivisionByZeroError::class);

        $operation = new Division();
        $operation->handle(22, 0);
    }

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Division();

        $this->assertSame(-1.2, $addition->handle(12, -10));
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Division();

        $this->assertSame($expected, $operation->handle(...$data));
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
