<?php
declare(strict_types=1);

namespace App\Services\Match;

use App\Models\Match\Match;
use App\Models\Match\MatchStats;
use App\Models\Team\Team;

/**
 * Class MatchResult
 *
 * @package App\Services\Match
 */
class MatchResult
{
    private const WIN_POINTS = 3;
    private const DRAW_POINTS = 1;
    private const LOSS_POINTS = 0;

    protected Match $match;

    protected MatchStats $matchStats;

    protected int $homeTeamScoredGoals = 0;

    protected int $awayTeamScoredGoals = 0;

    /**
     * MatchResult constructor.
     *
     * @param Match      $match
     * @param MatchStats $matchStats
     */
    public function __construct(Match $match, MatchStats $matchStats)
    {
        $this->match      = $match;
        $this->matchStats = $matchStats;

        $this->homeTeamScoredGoals = (int) round($this->matchStats->getHomeScoredGoals(), 0);
        $this->awayTeamScoredGoals = (int) round($this->matchStats->getAwayScoredGoals(), 0);
    }

    /**
     * @return int
     */
    public function getHomeTeamPoints(): int
    {
        if ($this->homeTeamScoredGoals === $this->awayTeamScoredGoals) {
            return static::DRAW_POINTS;
        }

        return $this->homeTeamScoredGoals > $this->awayTeamScoredGoals
            ? static::WIN_POINTS
            : static::LOSS_POINTS;
    }

    /**
     * @return int
     */
    public function getAwayTeamPoints(): int
    {
        if ($this->homeTeamScoredGoals === $this->awayTeamScoredGoals) {
            return static::DRAW_POINTS;
        }

        return $this->homeTeamScoredGoals < $this->awayTeamScoredGoals
            ? static::WIN_POINTS
            : static::LOSS_POINTS;
    }

    /**
     * @return Team
     */
    public function getHomeTeam(): Team
    {
        return $this->match->getHomeTeam()->getTeam();
    }

    /**
     * @return Team
     */
    public function getAwayTeam(): Team
    {
        return $this->match->getAwayTeam()->getTeam();
    }

    /**
     * @return int
     */
    public function getHomeTeamScoredGoals(): int
    {
        return $this->homeTeamScoredGoals;
    }

    /**
     * @return int
     */
    public function getAwayTeamScoredGoals(): int
    {
        return $this->awayTeamScoredGoals;
    }
}