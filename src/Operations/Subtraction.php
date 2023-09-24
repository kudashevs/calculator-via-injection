<?php

namespace CalculatorViaInterface\Operations;

class Subtraction implements Calculable
{
    use Validator;

    /**
     * @param int|float ...$numbers
     * @return int|float
     */
    public function calculate(...$numbers)
    {
        $this->validate($numbers);

        return array_shift($numbers) - array_sum($numbers);
    }
}
