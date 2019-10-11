<?php

namespace CalculatorViaInterface\Operations;

interface Operable
{
    public function check($a, $b);

    public function handle($a, $b);
}
