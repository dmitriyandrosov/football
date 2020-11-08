<?php
declare(strict_types=1);

namespace App\Services;

use App\Exceptions\SeasonIsOverException;
use App\Models\SeasonResult;

/**
 * Class LeagueSchedule
 *
 * @package App\Services
 */
class LeagueSchedule
{
    protected array $leagueTeams = [];

    /**
     * LeagueSchedule constructor.
     *
     * @param array|SeasonResult[] $leagueTeams
     */
    public function __construct(array $leagueTeams)
    {
        $this->leagueTeams = $leagueTeams;
    }

    /**
     * @param  SeasonResult  $homeLeagueTeam
     *
     * @return SeasonResult
     *
     * @throws SeasonIsOverException
     */
    public function findOpponent(SeasonResult $homeLeagueTeam): SeasonResult
    {
        $notPlayedTeams = array_filter(
            $this->leagueTeams,
            fn (SeasonResult $leagueTeam) =>
                $homeLeagueTeam->getTeam() !== $leagueTeam->getTeam() &&
                !$homeLeagueTeam->hasPlayedWith($leagueTeam->getTeam())
        );

        if (empty($notPlayedTeams)) {
            throw new SeasonIsOverException;
        }

        shuffle($notPlayedTeams);

        return $notPlayedTeams[0];
    }
}