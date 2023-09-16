<?php

namespace CalculatorViaInterface\Operations;

class Division implements Calculable
{
    use Validator {
        validate as traitValidate;
    }

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->validate($arguments);

        $start = array_shift($arguments);

        return array_reduce($arguments, function ($carry, $value) {
            return $carry / $value;
        }, $start);
    }

    private function validate(array $arguments): void
    {
        $this->traitValidate($arguments);

        foreach ($arguments as $argument) {
            if ($argument === 0) {
                throw new \DivisionByZeroError('Cannot divide by zero.');
            }
        }
    }
}
