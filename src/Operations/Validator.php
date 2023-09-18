<?php

namespace CalculatorViaInterface\Operations;

use CalculatorViaInterface\Exceptions\InvalidOperationArgument;

trait Validator
{
    /**
     * @param ...$arguments
     *
     * @throws InvalidOperationArgument
     */
    private function validate(...$arguments): void
    {
        $this->checkEmptyArguments(...$arguments);
        $this->checkNumericArguments(...$arguments);
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
