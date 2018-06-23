<?php

class ExampleTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function simple_proph()
    {
        $exister = $this->prophesize(Exister::class);
        
        $exister->foo('bar')->shouldBeCalled()->willReturn('foobar');
        
        $response = $exister->reveal()->foo('bar');
        
        $this->assertEquals('foobar', $response);
    }
    
    /** @test */
    public function it_normalizes_a_string_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());
        
        $cache->has('cache-key')->shouldBeCalled();
        
        $directive->setUp('cache-key');
    }
    
    /** @test */
    public function it_normalizes_a_cacheable_modal_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());
        
        $cache->has('stub-cache-key')->shouldBeCalled();
        
        $directive->setUp(new ModelStub());
    }
    
    /** @test */
    public function it_normalizes_an_array_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());
        
        $item = ['foo', 'bar'];
        
        $cache->has(md5('foobar'))->shouldBeCalled();
        
        $directive->setUp($item);
        
    }
    
}

class ModelStub
{
    public function getCachedKey()
    {
        return 'stub-cache-key';
    }
}