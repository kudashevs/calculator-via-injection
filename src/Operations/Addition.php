<?php

namespace CalculatorViaInterface\Operations;

class Addition implements Operable
{
    use Validator;

    /**
     * @param int|float $a
     * @param int|float $b
     * @return int|float
     */
    public function handle($a, $b)
    {
        $this->check($a, $b);

        return $a + $b;
    }
}
