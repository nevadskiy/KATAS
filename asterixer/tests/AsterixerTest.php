<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Asterixer;

class AsterixerTest extends TestCase
{
    public $asterixer;
    
    public function setUp()
    {
        $this->asterixer = Asterixer::make();
    }
    
    /** @test */
    public function it_hashes_simple_email()
    {
        $result = $this->asterixer->email('simple@email.com');
        
        $this->assertEquals('si**le@email.com', $result);
    }
    
    /** @test */
    public function it_hashes_short_email()
    {
        $result = $this->asterixer->email('mail@example.com');
    
        $this->assertEquals('m**l@example.com', $result);
    }
    
    /** @test */
    public function it_hashes_three_chars_email()
    {
        $result = $this->asterixer->email('abc@example.com');
    
        $this->assertEquals('a**@example.com', $result);
    }
    
    /** @test */
    public function it_hashes_tiny_email()
    {
        $result = $this->asterixer->email('as@example.com');
    
        $this->assertEquals('a*@example.com', $result);
    }
    
    /** @test */
    public function it_left_one_letter_email()
    {
        $result = $this->asterixer->email('a@example.com');
    
        $this->assertEquals('a@example.com', $result);
    }
    
    /** @test */
    public function it_hashes_long_email()
    {
        $result = $this->asterixer->email('looooooong@email.com');
    
        $this->assertEquals('lo******ng@email.com', $result);
    }
    
    /** @test */
    public function it_expect_invalid_email()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $this->asterixer->email('@email.com');
    }
}