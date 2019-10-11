<?php

namespace CalculatorViaInterface\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Operations\Addition;

class AdditionTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Addition();
        $operation->handle(12, 'str');
    }

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition();

        $this->assertSame(-8, $operation->handle(12, -20));
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Addition();

        $this->assertSame($expected, $operation->handle(...$data));
    }

    public function provideData()
    {
        return [
            'Valid integers' => [32, [12, 20]],
            'Valid floats' => [2.922222, [0.5, 2.422222]],
            'Valid integer and float' => [17.5, [12.5, 5]],
        ];
    }
}
