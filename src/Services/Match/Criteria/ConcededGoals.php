<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

/**
 * Class ConcededGoals
 *
 * @package App\Services\Match\Criteria
 */
class ConcededGoals extends Criteria implements IMatchCriteria
{
    /**
     * @inheritdoc
     */
    public function analyze(): void
    {
        $homeConceded =
            (
                $this->match->getHomeTeam()->getTeam()->getSeasonStats()->getConcededGoals() +
                $this->match->getAwayTeam()->getTeam()->getSeasonStats()->getScoredGoals()
            ) / 2;

        $this->matchStats->setAwayScoredGoals($homeConceded);
    }
}