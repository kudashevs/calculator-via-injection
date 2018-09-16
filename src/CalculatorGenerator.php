<?php
namespace CalculatorViaInterface;

class CalculatorGenerator
{
    /**
     * @var IOperator $operator
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
     * @param IOperator $operatorFunction
     * @param $operand1
     * @param $operand2
     * @throws \TypeError
     */
    public function __construct(IOperator $operatorFunction, $operand1, $operand2)
    {
        $this->operator = $operatorFunction;

        if (!is_numeric($operand1) || !is_numeric($operand2)) {
            throw new \TypeError('Operand must be numeric.');
        }

        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
    }

    public function calculate() {
        return $this->operator->execute($this->operand1, $this->operand2);
    }
}