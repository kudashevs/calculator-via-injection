<?php

namespace CalculatorViaInterface;

use CalculatorViaInterface\Operations\Operable;

class Calculator
{
    /**
     * @var Operable
     */
    protected $operator;

    /**
     * @var int|float[]
     */
    protected $operands;

    /**
     * CalculatorGenerator constructor.
     *
     * @param Operable $operation
     * @param mixed ...$operands
     */
    public function __construct(Operable $operation, ...$operands)
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
        return $this->operator->handle($this->operands[0], $this->operands[1]);
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
