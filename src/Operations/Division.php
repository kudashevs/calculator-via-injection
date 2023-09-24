<?php

namespace CalculatorViaInterface\Operations;

use CalculatorViaInterface\Exceptions\InvalidOperationArgument;

class Division implements Calculable
{
    use Validator {
        validate as traitValidate;
    }

    /**
     * @param int|float ...$numbers
     * @return int|float
     */
    public function calculate(...$numbers)
    {
        $this->validate($numbers);

        $start = array_shift($numbers);

        return array_reduce($numbers, function ($carry, $value) {
            return $carry / $value;
        }, $start);
    }

    private function validate(array $arguments): void
    {
        $this->traitValidate($arguments);

        foreach ($arguments as $argument) {
            if ($argument == 0) {
                throw new InvalidOperationArgument('Cannot divide by zero.');
            }
        }
    }
}
