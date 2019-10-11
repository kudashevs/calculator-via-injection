<?php
namespace CalculatorViaInterface\Operations;

class Multiplication implements Operation
{
    /** Multiplication operator
     *
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function execute($a, $b)
    {
        return $a * $b;
    }
}