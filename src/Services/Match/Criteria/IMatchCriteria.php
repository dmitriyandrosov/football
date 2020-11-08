<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

use App\Models\Match\Match;
use App\Models\Match\MatchStats;

/**
 * Interface IMatchCriteria
 *
 * @package App\Services\Match\Criteria
 */
interface IMatchCriteria
{
    /**
     * IMatchCriteria constructor.
     *
     * @param Match      $match
     * @param MatchStats $matchStats
     */
    public function __construct(Match $match, MatchStats $matchStats);

    /**
     * Analyze match using specific criteria.
     *
     * @return void
     */
    public function analyze(): void;
}