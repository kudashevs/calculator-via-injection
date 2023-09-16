<?php

namespace CalculatorViaInterface\Tests\Operations;

use CalculatorViaInterface\Operations\Division;
use CalculatorViaInterface\Operations\Validator;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    private const MAX_PRECISION = 0.000000001;

    private Division $division;

    protected function setUp(): void
    {
        $this->division = new Division();
    }

    /** @test */
    public function it_uses_the_validator_trait()
    {
        $this->assertContains(Validator::class, class_uses($this->division));
    }

    /** @test */
    public function it_can_throw_an_exception_when_division_by_integer_zero()
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->expectExceptionMessage('divide by');

        $this->division->calculate(42, 0);
    }

    /** @test */
    public function it_can_process_one_argument()
    {
        $this->assertSame(2, $this->division->calculate(2));
    }

    /** @test */
    public function it_can_process_two_arguments()
    {
        $this->assertSame(20, $this->division->calculate(40, 2));
    }

    /** @test */
    public function it_can_process_multiple_arguments()
    {
        $this->assertSame(7.25, $this->division->calculate(58, 4, 2, 1));
    }

    /** @test */
    public function it_can_process_a_negative_number()
    {
        $this->assertSame(-15, $this->division->calculate(45, -3));
    }

    /**
     * @test
     * @dataProvider provideDifferentValues
     */
    public function it_can_perform_division(array $values, $expected)
    {
        $this->assertEqualsWithDelta($expected, $this->division->calculate(...$values), self::MAX_PRECISION);
    }

    public function provideDifferentValues(): array
    {
        return [
            'divide integer and integer' => [
                [42, 20],
                2.1,
            ],
            'divide float and float' => [
                [3.5, 1.75],
                2.0,
            ],
            'divide integer and float' => [
                [12.5, 5],
                2.5,
            ],
            'divide float and integer' => [
                [5, 12.5],
                0.4,
            ],
        ];
    }
}
