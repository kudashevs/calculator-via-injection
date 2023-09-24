<?php

namespace CalculatorViaInterface;

require_once __DIR__ . '/../vendor/autoload.php';

use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Division;

try {
    $addition = new Calculator(new Addition());
    echo $addition->calculate(1, 2) . PHP_EOL; // results in 3
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo $e->getMessage() . PHP_EOL;
}

try {
    $division = new Calculator(new Division());
    echo $division->calculate(1, 2) . PHP_EOL; // results in 0.5
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo $e->getMessage() . PHP_EOL;
}
