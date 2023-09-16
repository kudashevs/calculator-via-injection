<?php

namespace CalculatorViaInterface\Operations;

interface Calculable
{
    /**
     * @param int|float ...$arguments
     * @return int|float
     *
     * @throws \InvalidArgumentException
     */
    public function calculate(...$arguments);
}
