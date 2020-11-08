<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Class SeasonStats
 *
 * @package App\Models
 */
class SeasonStats
{
    protected float $scoredGoals = 0;

    protected float $concededGoals = 0;

    protected float $homeScoredGoals = 0;

    protected float $homeConcededGoals = 0;

    protected float $awayScoredGoals = 0;

    protected float $awayConcededGoals = 0;

    /**
     * SeasonStats constructor.
     *
     * @param float $scoredGoals
     * @param float $concededGoals
     */
    public function __construct(float $scoredGoals, float $concededGoals)
    {
        $this->scoredGoals   = $scoredGoals;
        $this->concededGoals = $concededGoals;
    }

    /**
     * @return float
     */
    public function getScoredGoals(): float
    {
        return $this->scoredGoals;
    }

    /**
     * @return float
     */
    public function getConcededGoals(): float
    {
        return $this->concededGoals;
    }
}