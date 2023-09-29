<?php

declare(strict_types=1);

namespace CalculatorViaInterface\Operations;

class Multiplication implements Calculable
{
    use Validator;

    /**
     * @param int|float ...$numbers
     * @return int|float
     */
    public function calculate(...$numbers)
    {
        $this->validate($numbers);

        $start = array_shift($numbers);

        return array_reduce($numbers, static function ($carry, $value) {
            return $carry * $value;
        }, $start);
    }
}
