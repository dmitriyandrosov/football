<?php
declare(strict_types=1);

namespace App\Models\Team;

/**
 * Class HomeTeam
 *
 * @package App\Models\Team
 */
class HomeTeam
{
    protected const MORALE_COEFFICIENT = 1.05;

    protected Team $team;

    /**
     * HomeTeam constructor.
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