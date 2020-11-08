<?php
declare(strict_types=1);

namespace App\Services\Season;

use App\Helpers\Season\ConsoleOutput;

/**
 * Class SeasonReport
 *
 * @package App\Services\Season
 */
class SeasonReport
{
    protected array $leagueTeams;

    /**
     * SeasonReport constructor.
     *
     * @param array $leagueTeams
     */
    public function __construct(array $leagueTeams)
    {
        $this->leagueTeams = $leagueTeams;
    }

    /**
     * @return void
     */
    public function printTable(): void
    {
        foreach ($this->leagueTeams as $leagueTeam) {
            echo (new ConsoleOutput($leagueTeam))->render();
        }
    }
}