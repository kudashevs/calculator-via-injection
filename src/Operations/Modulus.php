<?php
namespace CalculatorViaInterface\Operations;

class Modulus implements Operation
{
    /** Modulus operator
     *
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function execute($a, $b)
    {
        if ($b == 0) {
            throw new \DivisionByZeroError('Argument must no be zero.');
        }

        return $a % $b;
    }
}