<?php
declare(strict_types=1);

namespace App\Models\Match;

use App\Models\Team\AwayTeam;
use App\Models\Team\HomeTeam;

/**
 * Class Match
 *
 * @package App\Models\Match
 */
class Match
{
    protected HomeTeam $homeTeam;

    protected AwayTeam $awayTeam;

    /**
     * Match constructor.
     *
     * @param HomeTeam $homeTeam
     * @param AwayTeam $awayTeam
     */
    public function __construct(HomeTeam $homeTeam, AwayTeam $awayTeam)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
    }

    /**
     * @return HomeTeam
     */
    public function getHomeTeam(): HomeTeam
    {
        return $this->homeTeam;
    }

    /**
     * @return AwayTeam
     */
    public function getAwayTeam(): AwayTeam
    {
        return $this->awayTeam;
    }
}