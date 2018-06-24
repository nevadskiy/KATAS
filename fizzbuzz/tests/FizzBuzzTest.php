<?php

class FizzBuzzTest extends \PHPUnit\Framework\TestCase
{
    private $fizzbuzz;

    public function setUp()
    {
        $this->fizzbuzz = new FizzBuzz();
    }

    /** @test */
    public function it_translate_1_for_1()
    {
        $result = $this->fizzbuzz->execute(1);

        $this->assertEquals(1, $result);
    }

    /** @test */
    public function it_translate_2_for_2()
    {
        $result = $this->fizzbuzz->execute(2);

        $this->assertEquals(2, $result);
    }

    /** @test */
    public function it_translate_3_for_fizz()
    {
        $result = $this->fizzbuzz->execute(3);

        $this->assertEquals('fizz', $result);
    }

    /** @test */
    public function it_translate_5_for_buzz()
    {
        $result = $this->fizzbuzz->execute(5);

        $this->assertEquals('buzz', $result);
    }

    /** @test */
    public function it_translate_6_for_fizz()
    {
        $result = $this->fizzbuzz->execute(6);

        $this->assertEquals('fizz', $result);
    }

    /** @test */
    public function it_translate_10_for_buzz()
    {
        $result = $this->fizzbuzz->execute(10);

        $this->assertEquals('buzz', $result);
    }

    /** @test */
    public function it_translate_11_for_11()
    {
        $result = $this->fizzbuzz->execute(11);

        $this->assertEquals(11, $result);
    }

    /** @test */
    public function it_translate_15_for_fizzbuzz()
    {
        $result = $this->fizzbuzz->execute(15);

        $this->assertEquals('fizzbuzz', $result);
    }

    /** @test */
    public function it_translates_a_sequence_of_numbers()
    {
        $result = $this->fizzbuzz->executeUpTo(5);

        $this->assertEquals([1, 2, 'fizz', 4, 'buzz'], $result);
    }
}