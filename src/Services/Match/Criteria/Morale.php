<?php
declare(strict_types=1);

namespace App\Services\Match\Criteria;

/**
 * Class Morale
 *
 * @package App\Services\Match\Criteria
 */
class Morale extends Criteria implements IMatchCriteria
{
    /**
     * @inheritdoc
     */
    public function analyze(): void
    {
        $homeScored   = $this->matchStats->getHomeScoredGoals() * $this->match->getHomeTeam()->getTeam()->getMorale();
        $homeConceded = $this->matchStats->getAwayScoredGoals() * $this->match->getAwayTeam()->getTeam()->getMorale();

        $this->matchStats->setHomeScoredGoals($homeScored);
        $this->matchStats->setAwayScoredGoals($homeConceded);
    }
}