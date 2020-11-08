<?php
declare(strict_types=1);

namespace App\Services\Match;

use App\Models\Match\Match;
use App\Models\Match\MatchStats;
use App\Services\Match\Criteria\ConcededGoals;
use App\Services\Match\Criteria\ScoredGoals;
use App\Services\Match\Criteria\ClubValue;
use App\Services\Match\Criteria\Morale;

/**
 * Class MatchSimulation
 *
 * @package App\Services\Match
 */
class MatchSimulation
{
    protected Match $match;

    protected MatchStats $matchStats;

    protected MatchResult $matchResult;

    /**
     * MatchSimulation constructor.
     *
     * @param Match $match
     */
    public function __construct(Match $match)
    {
        $this->match      = $match;
        $this->matchStats = new MatchStats;
    }

    /**
     * Play the match.
     *
     * @return void
     */
    public function play(): void
    {
        (new ScoredGoals($this->match, $this->matchStats))->analyze();
        (new ConcededGoals($this->match, $this->matchStats))->analyze();
        (new Morale($this->match, $this->matchStats))->analyze();
        (new ClubValue($this->match, $this->matchStats))->analyze();

        $this->matchResult = new MatchResult($this->match, $this->matchStats);
    }

    /**
     * Return result of specific match.
     *
     * @return MatchResult
     */
    public function getResult(): MatchResult
    {
        return $this->matchResult;
    }
}