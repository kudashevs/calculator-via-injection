<?php

namespace CalculatorViaInterface\Operations;

class Division implements Calculable
{
    use Validator {
        check as originalCheck;
    }

    /**
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function handle($a, $b)
    {
        $this->check($a, $b);

        return $a / $b;
    }

    public function check($a, $b)
    {
        $this->originalCheck($a, $b);

        if ($a == 0 || $b == 0) {
            throw new \DivisionByZeroError('Argument cannot be zero.');
        }
    }
}
