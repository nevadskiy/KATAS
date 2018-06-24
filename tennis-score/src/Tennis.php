<?php

/**
 * Class Tennis
 */
class Tennis
{
    /**
     * @var Player
     */
    protected $player1;

    /**
     * @var Player
     */
    protected $player2;

    /**
     * @var array
     */
    protected $translations = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    /**
     * Tennis constructor.
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * @return string
     */
    public function score()
    {
        if ($this->hasWinner()) {
             return 'Win for ' . $this->leader()->getName();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage ' . $this->leader()->getName();
        }

        if ($this->inDeuce())
        {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * @return string
     */
    protected function generalScore()
    {
        $score = $this->translations[$this->player1->getScore()] . '-';
        $score .= $this->isTied() ? 'All' : $this->translations[$this->player2->getScore()];

        return $score;
    }

    /**
     * @return bool
     */
    protected function hasAdvantage()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByOne();
    }

    /**
     * @return bool
     */
    protected function inDeuce()
    {
        return $this->player1->getScore() + $this->player2->getScore() >= 6 && $this->isTied();
    }

    /**
     * @return bool
     */
    protected function isTied()
    {
        return $this->player1->getScore() === $this->player2->getScore();
    }

    /**
     * @return bool
     */
    protected function hasWinner()
    {
        return $this->isLeadingByAtLeastTwo() && $this->hasEnoughPointsToWin();
    }

    /**
     * @return bool
     */
    protected function isLeadingByAtLeastTwo()
    {
        return abs($this->player1->getScore() - $this->player2->getScore()) >= 2;
    }

    /**
     * @return bool
     */
    protected function isLeadingByOne()
    {
        return abs($this->player1->getScore() - $this->player2->getScore()) === 1;
    }

    /**
     * @return bool
     */
    protected function hasEnoughPointsToWin()
    {
        return max($this->player1->getScore(), $this->player2->getScore()) >= 4;
    }

    /**
     * @return Player
     */
    protected function leader()
    {
        return $this->player1->getScore() > $this->player2->getScore()
            ? $this->player1
            : $this->player2;
    }
}
