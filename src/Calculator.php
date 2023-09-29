<?php

declare(strict_types=1);

namespace CalculatorViaInterface;

use CalculatorViaInterface\Exceptions\InvalidOperationArgument;
use CalculatorViaInterface\Operations\Calculable;

class Calculator
{
    protected Calculable $operator;

    /**
     * Calculator constructor.
     *
     * @param Calculable $operation
     */
    public function __construct(Calculable $operation)
    {
        $this->operator = $operation;
    }

    /**
     * Perform calculations.
     *
     * @param int|float ...$numbers
     * @return int|float
     *
     * @throws InvalidOperationArgument
     */
    public function calculate(...$numbers)
    {
        return $this->operator->calculate(...$numbers);
    }
}
