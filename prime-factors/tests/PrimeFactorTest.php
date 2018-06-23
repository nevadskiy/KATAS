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
        
        $this->assertEquals($result, []);
    }
}