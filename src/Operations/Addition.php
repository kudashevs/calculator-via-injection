<?php

namespace CalculatorViaInterface\Operations;

class Addition implements Calculable
{
    use Validator;

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->validate($arguments);

        return array_sum($arguments);
    }
}
