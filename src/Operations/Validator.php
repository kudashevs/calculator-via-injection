<?php

declare(strict_types=1);

namespace CalculatorViaInterface\Operations;

use CalculatorViaInterface\Exceptions\InvalidOperationArgument;

trait Validator
{
    /**
     * @param array<int|float> $arguments
     *
     * @throws InvalidOperationArgument
     */
    private function validate(array $arguments): void
    {
        $this->checkEmptyArguments($arguments);
        $this->checkNumericArguments($arguments);
    }

    private function checkEmptyArguments(array $arguments): void
    {
        if (count($arguments) === 0) {
            throw new InvalidOperationArgument('Please provide at least one argument.');
        }
    }

    private function checkNumericArguments(array $arguments): void
    {
        foreach ($arguments as $argument) {
            if (!is_numeric($argument)) {
                throw new InvalidOperationArgument('Only numeric arguments are allowed.');
            }
        }
    }
}
