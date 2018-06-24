<?php

/**
 * Class FizzBuzz
 */
class FizzBuzz
{
    /**
     * @param int $number
     * @return int
     */
    public function execute(int $number)
    {
        $result = '';

        if ($number % 3 === 0) {
            $result .= 'fizz';
        }

        if ($number % 5 === 0) {
            $result .= 'buzz';
        }

        return $result ?: $number;
    }

    /**
     * @param int $number
     * @return array
     */
    public function executeUpTo(int $number)
    {
        return array_map(function($item) {
            return $this->execute($item);
        }, range(1, $number));
    }
}