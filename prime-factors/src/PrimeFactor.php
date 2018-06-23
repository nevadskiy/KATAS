<?php

/**
 * Class PrimeFactor
 */
class PrimeFactor
{
    /**
     * @param $number
     * @return array
     */
    public function generate($number)
    {
            $primes = [];
            $divisor = 2;
    
            // Non-recursive approach
            while ($number > 1) {
                while ($number % $divisor === 0)
                {
                    $primes[] = $divisor;
                    $number /= $divisor;
                }
        
                $divisor++;
            }
        
            return $primes;
    }
}
