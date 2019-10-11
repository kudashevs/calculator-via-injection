<?php

namespace CalculatorViaInterface\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaInterface\Operations\Modulus;

class ModulusTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testCheckThrowExceptionWhenArgumentNotNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);

        $operation = new Modulus();
        $operation->handle(12, 'str');
    }

    public function testCheckThrowExceptionWhenArgumentsContainZero()
    {
        $this->expectException(\DivisionByZeroError::class);

        $operation = new Modulus();
        $operation->handle(22, 0);
    }

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Modulus();

        $this->assertSame(2, $addition->handle(12, -10));
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Modulus();

        $this->assertSame($expected, $operation->handle(...$data));
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
