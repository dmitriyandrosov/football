<?php
declare(strict_types=1);

namespace App\Models\Team;

/**
 * Class AwayTeam
 *
 * @package App\Models\Team
 */
class AwayTeam
{
    protected const MORALE_COEFFICIENT = 0.95;

    protected Team $team;

    /**
     * AwayTeam constructor.
     *
     * @param Team $team
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
        $this->team->adjustMorale(self::MORALE_COEFFICIENT);
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }
}