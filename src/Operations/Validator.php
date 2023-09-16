<?php

namespace CalculatorViaInterface\Operations;

trait Validator
{
    /**
     * @param ...$arguments
     *
     * @throws \InvalidArgumentException
     */
    private function validate(...$arguments): void
    {
        $this->checkEmptyArguments(...$arguments);
        $this->checkNumericArguments(...$arguments);
    }

    private function checkEmptyArguments(array $arguments): void
    {
        if (count($arguments) === 0) {
            throw new \InvalidArgumentException('Please provide at least one argument.');
        }
    }

    private function checkNumericArguments(array $arguments): void
    {
        foreach ($arguments as $argument) {
            if (!is_numeric($argument)) {
                throw new \InvalidArgumentException('Only numeric arguments are allowed.');
            }
        }
    }
}
