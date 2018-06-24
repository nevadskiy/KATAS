<?php namespace Tests;

use PHPUnit\Framework\TestCase;
use StringCalculator;

class StringCalculatorTest extends TestCase
{
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new StringCalculator();
    }

    /** @test */
    public function it_translates_an_empty_string_into_zero()
    {
        $result = $this->calculator->add('');

        $this->assertEquals(0, $result);
    }

    /** @test */
    public function it_finds_the_sum_of_one_number()
    {
        $result = $this->calculator->add('4');

        $this->assertEquals(4, $result);
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers()
    {
        $result = $this->calculator->add('2,3');

        $this->assertEquals(5, $result);
    }

    /** @test */
    public function it_finds_the_sum_of_any_amount_numbers()
    {
        $result = $this->calculator->add('2,3,4,5,6');

        $this->assertEquals(20, $result);
    }

    /** @test */
    public function it_disallows_negative_numbers()
    {
        $this->expectException('InvalidArgumentException');

        $result = $this->calculator->add('3,-2');
    }

    /** @test */
    public function it_ignores_any_numbers_that_is_one_thousand_or_greater()
    {
        $result = $this->calculator->add('3,5,1000,1200');

        $this->assertEquals(8, $result);
    }
}