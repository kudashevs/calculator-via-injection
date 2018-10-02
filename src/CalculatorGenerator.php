<?php
namespace CalculatorViaInterface;

use CalculatorViaInterface\Operators\OperatorInterface;

class CalculatorGenerator
{
    /**
     * @var OperatorInterface $operator
     */
    protected $operator;

    /**
     * @var int|float $operand1
     */
    protected $operand1;

    /**
     * @var int|float $operand2
     */
    protected $operand2;

    /**
     * CalculatorGenerator constructor
     *
     * @param OperatorInterface $operatorFunction
     * @param int|float $operand1
     * @param int|float $operand2
     *
     * @throws \TypeError
     */
    public function __construct(OperatorInterface $operatorFunction, $operand1, $operand2)
    {
        $this->operator = $operatorFunction;

        if (!is_numeric($operand1) || !is_numeric($operand2)) {
            throw new \TypeError('Operand must be numeric.');
        }

        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
    }

    /**
     * Execute operator calculation
     *
     * @return mixed
     */
    public function calculate() {
        return $this->operator->execute($this->operand1, $this->operand2);
    }
}