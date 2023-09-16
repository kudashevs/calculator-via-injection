<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Addition();
        $operation->calculate(12, 'str');
    }

    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition();

        $this->assertSame(-8, $operation->calculate(12, -20));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Addition();

        $this->assertSame($expected, $operation->calculate(...$data));
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
