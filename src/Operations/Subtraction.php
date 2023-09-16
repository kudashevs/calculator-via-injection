<?php

namespace CalculatorViaInterface\Operations;

class Subtraction implements Calculable
{
    use Validator;

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->validate($arguments);

        return array_shift($arguments) - array_sum($arguments);
    }
}
