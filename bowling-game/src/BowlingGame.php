<?php

/**
 * Class BowlingGame
 */
class BowlingGame
{
    /**
     * @var int
     */
    protected $score = 0;

    /**
     * @var array
     */
    protected $rolls = [];

    /**
     * @param $pins
     */
    public function roll(int $pins)
    {
        $this->guardAgainstInvalidRoll($pins);

        $this->rolls[] = $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->getStrikeBonus($roll);
                $roll++;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->getSpareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getDefaultScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isSpare($roll): bool
    {
        return $this->getDefaultScore($roll) === 10;
    }

    /**
     * @param $roll
     * @return mixed
     */
    private function getDefaultScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param $roll
     * @return int
     */
    private function getSpareBonus($roll): int
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isStrike($roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    /**
     * @param $roll
     * @return int|mixed
     */
    private function getStrikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * @param int $pins
     */
    private function guardAgainstInvalidRoll(int $pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new InvalidArgumentException("Wrong pins are given");
        }
    }
}