<?php

namespace CalculatorViaInterface\Operations;

class Addition implements Calculable
{
    use Validator;

    public function check($a, $b)
    {
        $this->validate([$a, $b]);
    }

    /**
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function calculate($a, $b)
    {
        $this->check($a, $b);

        return $a + $b;
    }
}
