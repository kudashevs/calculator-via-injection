<?php

namespace CalculatorViaInterface\Operations;

class Division implements Calculable
{
    use Validator;

    private function check(...$arguments): void
    {
        $this->validate($arguments);

        foreach ($arguments as $argument) {
            if ($argument === 0) {
                throw new \DivisionByZeroError('Cannot divide by zero.');
            }
        }
    }

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->check(...$arguments);

        $start = array_shift($arguments);

        return array_reduce($arguments, function ($carry, $value) {
            return $carry / $value;
        }, $start);
    }
}
