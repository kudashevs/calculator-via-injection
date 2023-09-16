<?php

namespace CalculatorViaInterface;

use CalculatorViaInterface\Operations\Calculable;

class Calculator
{
    /**
     * @var Calculable
     */
    protected $operator;

    /**
     * @var int|float[]
     */
    protected $operands;

    /**
     * CalculatorGenerator constructor.
     *
     * @param Calculable $operation
     * @param mixed ...$operands
     */
    public function __construct(Calculable $operation, ...$operands)
    {
        $this->operator = $operation;
        $this->operands = $this->initOperands($operands);
    }

    /**
     * Execute operator calculation.
     *
     * @return mixed
     */
    public function calculate()
    {
        return $this->operator->calculate($this->operands[0], $this->operands[1]);
    }

    /**
     * @param array $operands
     * @return array
     */
    protected function initOperands(array $operands): array
    {
        if (empty($operands)) {
            throw new \InvalidArgumentException('Empty array provided.');
        }

        if (count($operands) !== 2) {
            throw new \InvalidArgumentException('You should provide 2 operand.');
        }

        foreach ($operands as $operand) {
            if (!is_numeric($operand)) {
                throw new \InvalidArgumentException('Operand must be numeric.');
            }
        }

        return $operands;
    }
}
