<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Modulus;
use PHPUnit\Framework\TestCase;

class ModulusTest extends TestCase
{
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Modulus();
        $operation->calculate(12, 'str');
    }

    public function testCheckThrowExceptionWhenArgumentsContainZero()
    {
        $this->expectException(\DivisionByZeroError::class);

        $operation = new Modulus();
        $operation->calculate(22, 0);
    }

    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Modulus();

        $this->assertSame(2, $addition->calculate(12, -10));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Modulus();

        $this->assertSame($expected, $operation->calculate(...$data));
    }

    public function provideData()
    {
        return [
            'Valid integers' => [0, [22, 2]],
            'Valid floats' => [0.5, [9.7, 2.3]],
            'Valid integer and float' => [0.5, [37.5, 1]],
        ];
    }
}
