<?php

class BowlingGame
{
    protected $score = 0;

    protected $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {
            if ($this->isSpare($roll)) {
                $score += $this->getSpareScore($roll);
            } else {
                $score += $this->getDefaultFrameScore($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isSpare($roll): bool
    {
        return $this->getDefaultFrameScore($roll) === 10;
    }

    /**
     * @param $roll
     * @return mixed
     */
    private function getDefaultFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param $roll
     * @return int
     */
    private function getSpareScore($roll): int
    {
        return 10 + $this->rolls[$roll + 2];
    }
}