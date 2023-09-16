<?php

namespace CalculatorViaInterface\Operations;

interface Calculable
{
    /**
     * @param int|float $a
     * @param int|float $b
     * @return mixed
     */
    public function calculate($a, $b);
}
