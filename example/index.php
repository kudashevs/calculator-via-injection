<?php

use CalculatorViaInterface\CalculatorGenerator;
use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Division;

require_once 'vendor/autoload.php';

try {
    $calculator = new CalculatorGenerator(new Addition(), 1, 2);
    echo $calculator->calculate() . PHP_EOL; // 3
} catch (\TypeError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments type passed to constructor!' . PHP_EOL;
}

try {
    $calculator = new CalculatorGenerator(new Division(), 1, 2);
    echo $calculator->calculate() . PHP_EOL; // 0.5
} catch (\DivisionByZeroError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo 'Division failed due to division by zero error!' . PHP_EOL;
} catch (\TypeError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments type passed to constructor!' . PHP_EOL;
}