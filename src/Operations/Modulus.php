<?php

namespace CalculatorViaInterface\Operations;

class Modulus implements Calculable
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
    public function handle($a, $b)
    {
        $this->check($a, $b);

        if (is_float($a) || is_float($b)) {
            return fmod($a, $b);
        }

        return $a % $b;
    }
}
