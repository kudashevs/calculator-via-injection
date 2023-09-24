<?php

namespace CalculatorViaInterface\Operations;

interface Calculable
{
    /**
     * @param int|float ...$numbers
     * @return int|float
     *
     * @throws \InvalidArgumentException
     */
    public function calculate(...$numbers);
}
