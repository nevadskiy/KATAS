<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PrimeFactor;

class PrimeFactorTest extends TestCase
{
    public $primeFactor;
    
    public function setUp()
    {
        $this->primeFactor = new PrimeFactor();
    }
    
    /** @test */
    public function it_returns_an_empty_array_for_one()
    {
        $result = $this->primeFactor->generate(1);
        
        $this->assertEquals([], $result);
    }
    
    /** @test */
    public function it_retunrs_2_for_2()
    {
        $result = $this->primeFactor->generate(2);
        
        $this->assertEquals([2], $result);
    }
    
    /** @test */
    public function it_returns_3_for_3()
    {
        $result = $this->primeFactor->generate(3);
    
        $this->assertEquals([3], $result);
    }
    
    /** @test */
    public function it_returns_2_2_for_4()
    {
        $result = $this->primeFactor->generate(4);
        
        $this->assertEquals([2, 2], $result);
    }
    
    /** @test */
    public function it_returns_5_for_5()
    {
        $result = $this->primeFactor->generate(5);
        
        $this->assertEquals([5], $result);
    }
    
    /** @test */
    public function it_returns_2_3_for_6()
    {
        $result = $this->primeFactor->generate(6);
        
        $this->assertEquals([2, 3], $result);
    }
    
    /** @test */
    public function it_returns_2_2_2_for_8()
    {
        $result = $this->primeFactor->generate(8);
        
        $this->assertEquals([2, 2, 2], $result);
    }
    
    /** @test */
    public function it_returns_3_3_for_9()
    {
        $result = $this->primeFactor->generate(9);
        
        $this->assertEquals([3, 3], $result);
    }
    
    /** @test */
    public function it_returns_2_2_5_5_for_100()
    {
        $result = $this->primeFactor->generate(100);
        
        $this->assertEquals([2, 2, 5, 5], $result);
    }
}