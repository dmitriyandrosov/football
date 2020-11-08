<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

/**
 * Class ClubValue
 *
 * @package App\Services\Match\Criteria
 */
class ClubValue extends Criteria implements IMatchCriteria
{
    /**
     * @inheritdoc
     */
    public function analyze(): void
    {
        $homeScored   = $this->matchStats->getHomeScoredGoals() * $this->match->getHomeTeam()->getTeam()->getClubValue();
        $homeConceded = $this->matchStats->getAwayScoredGoals() * $this->match->getAwayTeam()->getTeam()->getClubValue();

        $this->matchStats->setHomeScoredGoals($homeScored);
        $this->matchStats->setAwayScoredGoals($homeConceded);
    }
}