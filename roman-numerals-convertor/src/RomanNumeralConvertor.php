<?php

/**
 * Class RomanNumeralConvertor
 */
class RomanNumeralConvertor
{
    /**
     * @var array
     */
    protected static $convertions = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];
    
    /**
     * @param int $number
     * @return string
     */
    public function convert(int $number): string
    {
        $converted = '';
        
        foreach (static::$convertions as $arabic => $roman) {
            while ($number >= $arabic) {
                $converted .= $roman;
                $number -= $arabic;
            }
        }
        
        return $converted;
    }
}