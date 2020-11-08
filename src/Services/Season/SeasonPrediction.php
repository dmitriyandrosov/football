<?php
declare(strict_types=1);

namespace App\Services\Season;

/**
 * Class SeasonPrediction
 *
 * @package App\Services\Season
 */
class SeasonPrediction
{
    protected array $leagueTeams;

    /**
     * SeasonPrediction constructor.
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
    public function predict(): void
    {
        //TODO: criteria
    }
}