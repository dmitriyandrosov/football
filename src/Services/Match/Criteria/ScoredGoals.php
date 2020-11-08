<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

/**
 * Class ScoredGoals
 *
 * @package App\Services\Match\Criteria
 */
class ScoredGoals extends Criteria implements IMatchCriteria
{
    /**
     * @inheritdoc
     */
    public function analyze(): void
    {
        $homeScored =
            (
                $this->match->getHomeTeam()->getTeam()->getSeasonStats()->getScoredGoals() +
                $this->match->getAwayTeam()->getTeam()->getSeasonStats()->getConcededGoals()
            ) / 2;

        $this->matchStats->setHomeScoredGoals($homeScored);
    }
}