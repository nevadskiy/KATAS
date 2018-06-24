<?php

class TennisScoreTest extends \PHPUnit\Framework\TestCase
{
    private $game;
    private $john;
    private $jane;

    public function setUp()
    {
        $this->john = new Player('John', 0);
        $this->jane = new Player('Jane', 0);
        $this->game = new Tennis($this->john, $this->jane);
    }

    /** @test */
    public function it_scores_a_scoreless_game()
    {
        $result = $this->game->score();

        $this->assertEquals('Love-All', $result);
    }

    /** @test */
    public function it_scores_1_0_game()
    {
        $this->john->earnPoints(1);

        $result = $this->game->score();

        $this->assertEquals('Fifteen-Love', $result);
    }

    /** @test */
    public function it_scores_2_0_game()
    {
        $this->john->earnPoints(2);

        $result = $this->game->score();

        $this->assertEquals('Thirty-Love', $result);
    }

    /** @test */
    public function it_scores_3_0_game()
    {
        $this->john->earnPoints(3);

        $result = $this->game->score();

        $this->assertEquals('Forty-Love', $result);
    }

    /** @test */
    public function it_scores_4_0_game()
    {
        $this->john->earnPoints(4);

        $result = $this->game->score();

        $this->assertEquals('Win for John', $result);
    }

    /** @test */
    public function it_scores_0_4_game()
    {
        $this->jane->earnPoints(4);

        $result = $this->game->score();

        $this->assertEquals('Win for Jane', $result);
    }

    /** @test */
    public function it_scores_4_3_game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $result = $this->game->score();

        $this->assertEquals('Advantage John', $result);
    }

    /** @test */
    public function it_scores_3_4_game()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(4);

        $result = $this->game->score();

        $this->assertEquals('Advantage Jane', $result);
    }

    /** @test */
    public function it_scores_4_4_game()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $result = $this->game->score();

        $this->assertEquals('Deuce', $result);
    }

    /** @test */
    public function it_scores_10_10_game()
    {
        $this->john->earnPoints(10);
        $this->jane->earnPoints(10);

        $result = $this->game->score();

        $this->assertEquals('Deuce', $result);
    }
    /** @test */
    public function it_scores_112_114_game()
    {
        $this->john->earnPoints(112);
        $this->jane->earnPoints(114);

        $result = $this->game->score();

        $this->assertEquals('Win for Jane', $result);
    }
}
