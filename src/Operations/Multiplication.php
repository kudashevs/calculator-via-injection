<?php

namespace CalculatorViaInterface\Operations;

class Multiplication implements Calculable
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
    public function handle($a, $b)
    {
        $this->check($a, $b);

        return $a * $b;
    }
}
