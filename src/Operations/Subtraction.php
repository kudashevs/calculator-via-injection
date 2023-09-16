<?php

namespace CalculatorViaInterface\Operations;

class Subtraction implements Calculable
{
    use Validator;

    private function check(...$arguments): void
    {
        $this->validate($arguments);
    }

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->check(...$arguments);

        return array_shift($arguments) - array_sum($arguments);
    }
}
