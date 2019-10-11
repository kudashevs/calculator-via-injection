<?php

namespace CalculatorViaInterface;

require_once __DIR__ . '/../vendor/autoload.php';

use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Division;

try {
    $calc = new Calculator(new Addition(), 1, 2);
    echo $calc->calculate() . PHP_EOL; // 3
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo $e->getMessage() . PHP_EOL;
}


try {
    $calc = new Calculator(new Division(), 1, 2);
    echo $calc->calculate() . PHP_EOL; // 0.5
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo $e->getMessage() . PHP_EOL;
}