<?php

namespace CalculatorViaInterface\Operations;

interface Calculable
{
    public function check($a, $b);

    public function handle($a, $b);
}
