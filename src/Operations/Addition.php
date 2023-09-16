<?php

namespace CalculatorViaInterface\Operations;

class Addition implements Calculable
{
    use Validator;

    private function check($a, $b): void
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
