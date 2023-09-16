<?php

namespace CalculatorViaInterface\Operations;

class Division implements Calculable
{
    use Validator {
        validate as originalCheck;
    }

    private function check($a, $b): void
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
