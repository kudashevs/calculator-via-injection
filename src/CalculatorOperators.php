<?php
namespace CalculatorViaInterface;

class Addition implements IOperator
{
    /**
     * Addition operator
     *
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function execute($a, $b)
    {
        return $a + $b;
    }
}

class Substraction implements IOperator
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

class Multiplication implements IOperator
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

class Division implements IOperator
{
    /** Division operator
     *
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function execute($a, $b)
    {
        if ($b === 0) {
            throw new \DivisionByZeroError('Argument must no be zero.');
        }

        return $a / $b;
    }
}