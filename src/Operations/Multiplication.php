<?php

namespace CalculatorViaInterface\Operations;

class Multiplication implements Calculable
{
    use Validator;

    private function check(...$arguments): void
    {
        $this->validate($arguments);
    }

    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    public function calculate(...$arguments)
    {
        $this->check(...$arguments);

        $start = array_shift($arguments);

        return array_reduce($arguments, function ($carry, $value) {
            return $carry * $value;
        }, $start);
    }
}
