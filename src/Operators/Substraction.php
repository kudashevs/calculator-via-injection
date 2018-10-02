<?php
namespace CalculatorViaInterface\Operators;

class Substraction implements OperatorInterface
{
    /** Substraction operator
     *
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function execute($a, $b)
    {
        return $a - $b;
    }
}