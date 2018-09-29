<?php
namespace CalculatorViaInterface;

class Addition implements OperatorInterface
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

class Multiplication implements OperatorInterface
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

class Division implements OperatorInterface
{
    /** Division operator
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

        return $a / $b;
    }
}

class Modulus implements OperatorInterface
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