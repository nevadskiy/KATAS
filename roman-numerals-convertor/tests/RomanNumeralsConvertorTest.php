<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use RomanNumeralConvertor;

class RomanNumeralsConvertorTest extends TestCase
{
    private $convertor;
    
    public function setUp()
    {
        $this->convertor = new RomanNumeralConvertor();
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_1()
    {
        $result = $this->convertor->convert(1);
        
        $this->assertEquals('I', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_2()
    {
        $result = $this->convertor->convert(2);
        
        $this->assertEquals('II', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_4()
    {
        $result = $this->convertor->convert(4);
        
        $this->assertEquals('IV', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_5()
    {
        $result = $this->convertor->convert(5);
        
        $this->assertEquals('V', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_6()
    {
        $result = $this->convertor->convert(6);
        
        $this->assertEquals('VI', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_8()
    {
        $result = $this->convertor->convert(8);
        
        $this->assertEquals('VIII', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_9()
    {
        $result = $this->convertor->convert(9);
        
        $this->assertEquals('IX', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_10()
    {
        $result = $this->convertor->convert(10);
        
        $this->assertEquals('X', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_11()
    {
        $result = $this->convertor->convert(11);
        
        $this->assertEquals('XI', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_20()
    {
        $result = $this->convertor->convert(20);
        
        $this->assertEquals('XX', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_50()
    {
        $result = $this->convertor->convert(50);
        
        $this->assertEquals('L', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_100()
    {
        $result = $this->convertor->convert(100);
        
        $this->assertEquals('C', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_500()
    {
        $result = $this->convertor->convert(500);
        
        $this->assertEquals('D', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_1000()
    {
        $result = $this->convertor->convert(1000);
        
        $this->assertEquals('M', $result);
    }
    
    /** @test */
    public function it_calculates_the_roman_numeral_for_1995()
    {
        $result = $this->convertor->convert(1995);
        
        $this->assertEquals('MCMXCV', $result);
    }
}