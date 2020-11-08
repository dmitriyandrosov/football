<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Team\Team;

/**
 * Class SeasonResult
 *
 * @package App\Models
 */
class SeasonResult
{
    protected Team $team;

    protected int $points = 0;

    protected int $played = 0;

    protected int $won = 0;

    protected int $draw = 0;

    protected int $loss = 0;

    protected int $scoredGoals = 0;

    protected int $concededGoals = 0;

    protected int $goalDifference = 0;

    protected array $opponents = [];

    /**
     * SeasonResult constructor.
     *
     * @param Team $team
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param  int  $points
     *
     * @return void
     */
    public function addPoints(int $points): void
    {
        $this->points += $points;
    }

    /**
     * @return int
     */
    public function getPlayed(): int
    {
        return $this->played;
    }

    /**
     * @return void
     */
    public function addPlayed(): void
    {
        $this->played++;
    }

    /**
     * @return int
     */
    public function getWon(): int
    {
        return $this->won;
    }

    /**
     * @return void
     */
    public function addWon(): void
    {
        $this->won++;
    }

    /**
     * @return int
     */
    public function getDraw(): int
    {
        return $this->draw;
    }

    /**
     * @return void
     */
    public function addDraw(): void
    {
        $this->draw++;
    }

    /**
     * @return int
     */
    public function getLoss(): int
    {
        return $this->loss;
    }

    /**
     * @return void
     */
    public function addLoss(): void
    {
        $this->loss++;
    }

    /**
     * @return int
     */
    public function getScoredGoals(): int
    {
        return $this->scoredGoals;
    }

    /**
     * @param  int  $scoredGoals
     *
     * @return void
     */
    public function adjustScoredGoals(int $scoredGoals): void
    {
        $this->scoredGoals += $scoredGoals;
    }

    /**
     * @return int
     */
    public function getConcededGoals(): int
    {
        return $this->concededGoals;
    }

    /**
     * @param  int  $concededGoals
     *
     * @return void
     */
    public function adjustConcededGoals(int $concededGoals): void
    {
        $this->concededGoals += $concededGoals;
    }

    /**
     * @return int
     */
    public function getGoalDifference(): int
    {
        return $this->goalDifference;
    }

    /**
     * @param  int  $goalDifference
     *
     * @return void
     */
    public function adjustGoalDifference(int $goalDifference): void
    {
        $this->goalDifference += $goalDifference;
    }

    /**
     * @param  Team  $team
     *
     * @return void
     */
    public function addOpponent(Team $team): void
    {
        $this->opponents[] = $team;
    }

    /**
     * Checks if matched happened between to teams.
     *
     * @param  Team  $team
     *
     * @return bool
     */
    public function hasPlayedWith(Team $team): bool
    {
        return in_array($team, $this->opponents, true);
    }
}