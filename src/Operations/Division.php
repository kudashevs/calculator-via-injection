<?php

declare(strict_types=1);

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

        return array_reduce($numbers, static function ($carry, $value) {
            return $carry / $value;
        }, $start);
    }

    /**
     * @param array<int|float> $arguments
     */
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
