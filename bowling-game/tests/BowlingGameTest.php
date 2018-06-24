<?php namespace Tests;

use PHPUnit\Framework\TestCase;
use BowlingGame;

class BowlingGameTest extends TestCase
{
    protected $game;

    public function setUp()
    {
        $this->game = new BowlingGame();
    }

    /** @test */
    public function it_scores_a_gutter_game_as_zero()
    {
        $this->rollTimes(20, 0);

        $score = $this->game->score();

        $this->assertEquals(0, $score);
    }

    /** @test */
    public function it_scores_all_knocked_down_pins_for_a_game()
    {
        $this->rollTimes(20, 1);

        $score = $this->game->score();

        $this->assertEquals(20, $score);
    }

    /** @test */
    public function it_award_a_one_roll_bonus_for_every_spare()
    {
        $this->rollSpare();

        $this->game->roll(5);

        $this->rollTimes(20, 0);

        $score = $this->game->score();

        $this->assertEquals(20, $score);
    }

    /** @test */
    public function it_roles_a_two_rolls_bonus_for_a_strike_in_the_previous_frame()
    {
        $this->rollStrike();

        $this->game->roll(7);
        $this->game->roll(2);

        $this->rollTimes(17, 0);

        $score = $this->game->score();

        $this->assertEquals(28, $score);
    }

    /** @test */
    public function it_scores_a_perfect_game()
    {
        $this->rollTimes(12, 10);

        $score = $this->game->score();

        $this->assertEquals(300, $score);
    }

    private function rollSpare(): void
    {
        $this->game->roll(2);
        $this->game->roll(8);
    }

    private function rollStrike(): void
    {
        $this->game->roll(10);
    }

    private function rollTimes(int $times, int $pins)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->game->roll($pins);
        }
    }
}