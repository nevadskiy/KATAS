<?php

class PrimeFactor
{
    public function generate($number)
    {
        $primes = [];
        $divisor = 2;
        
        while ($number > 1) {
            while ($number % $divisor === 0) // Non-recursive approach
            {
                $primes[] = $divisor;
                $number /= $divisor;
            }
            
            $divisor++;
        }
        
        return $primes;
    }
}