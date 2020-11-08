<?php
declare(strict_types=1);

namespace App\Models\Match;

/**
 * Class MatchStats
 *
 * @package App\Models\Match
 */
class MatchStats
{
    protected float $homeTeamScoredGoals = 0;

    protected float $awayTeamScoredGoals = 0;

    /**
     * @return float
     */
    public function getHomeScoredGoals(): float
    {
        return $this->homeTeamScoredGoals;
    }

    /**
     * @param float $homeTeamScoredGoals
     */
    public function setHomeScoredGoals(float $homeTeamScoredGoals): void
    {
        $this->homeTeamScoredGoals = $homeTeamScoredGoals;
    }

    /**
     * @return float
     */
    public function getAwayScoredGoals(): float
    {
        return $this->awayTeamScoredGoals;
    }

    /**
     * @param float $awayTeamScoredGoals
     */
    public function setAwayScoredGoals(float $awayTeamScoredGoals): void
    {
        $this->awayTeamScoredGoals = $awayTeamScoredGoals;
    }
}