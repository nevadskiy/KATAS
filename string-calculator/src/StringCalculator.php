<?php

class StringCalculator
{
    public function add(string $numbers)
    {
        $numbers = explode(',', $numbers);

        $sum = 0;

        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new InvalidArgumentException('Value can not be negative');
            }

            if ($number >= 1000) {
                continue;
            }

            $sum += (int) $number;
        }

        return $sum;
    }
}