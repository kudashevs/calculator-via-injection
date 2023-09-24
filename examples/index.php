<?php

namespace CalculatorViaInterface;

require_once __DIR__ . '/../vendor/autoload.php';

use CalculatorViaInterface\Operations\Addition;
use CalculatorViaInterface\Operations\Division;

try {
    $addition = new Calculator(new Addition());
    echo $addition->calculate(1, 2) . PHP_EOL; // results in 3
} catch (\Exception $e) {
    echo explainException($e);
}

try {
    $division = new Calculator(new Division());
    echo $division->calculate(1, 2) . PHP_EOL; // results in 0.5
} catch (\Exception $e) {
    echo explainException($e);
}

function explainException(\Throwable $exception): string
{
    return sprintf(
        '%s: Something went wrong with a message "%s" in file %s on line %s.' . PHP_EOL,
        get_class($exception),
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine(),
    );
}
