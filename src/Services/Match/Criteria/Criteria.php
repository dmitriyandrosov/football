<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

use App\Models\Match\Match;
use App\Models\Match\MatchStats;

/**
 * Class Criteria
 *
 * @package App\Services\Match\Criteria
 */
abstract class Criteria
{
    protected Match $match;

    protected MatchStats $matchStats;

    /**
     * Criteria constructor.
     *
     * @param Match      $match
     * @param MatchStats $matchStats
     */
    public function __construct(Match $match, MatchStats $matchStats)
    {
        $this->match      = $match;
        $this->matchStats = $matchStats;
    }
}