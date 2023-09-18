<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Exceptions\InvalidOperationArgument;
use CalculatorViaInterface\Operations\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    private object $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = new class {
            use Validator;

            public function check(...$arguments): void
            {
                $this->validate($arguments);
            }
        };
    }

    /** @test */
    public function it_can_throw_an_exception_when_no_arguments_provided()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('at least');

        $this->wrapper->check();
    }

    /** @test */
    public function it_can_throw_an_exception_when_an_argument_of_a_wrong_type()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('numeric');

        $this->wrapper->check(42, 'wrong');
    }
}
