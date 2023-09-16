<?php

namespace CalculatorViaInterface\Operations;

class Division implements Calculable
{
    use Validator {
        validate as originalCheck;
    }

    public function check($a, $b)
    {
        $this->originalCheck([$a, $b]);

        if ($a == 0 || $b == 0) {
            throw new \DivisionByZeroError('Argument cannot be zero.');
        }
    }

    /**
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function calculate($a, $b)
    {
        $this->check($a, $b);

        return $a / $b;
    }
}
