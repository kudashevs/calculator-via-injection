<?php

namespace CalculatorViaInterface\Operations;

trait Validator
{
    public function check($arg1, $arg2)
    {
        if (!is_numeric($arg1) || !is_numeric($arg2)) {
            throw new \InvalidArgumentException('Argument must be numeric.');
        }
    }
}
