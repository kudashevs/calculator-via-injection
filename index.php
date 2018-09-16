<?php
namespace CalculatorViaInterface;

require_once 'src/bootstrap.php';

$calculator = new CalculatorGenerator(new Addition(), 1, 2);
echo $calculator->calculate() . PHP_EOL; // 3

$calculator = new CalculatorGenerator(new Division(), 1, 2);
echo $calculator->calculate() . PHP_EOL; // 0.5