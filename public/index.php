<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Models\SeasonResult;
use App\Models\SeasonStats;
use App\Models\Team\Team;
use App\Services\Season\SeasonReport;
use App\Services\Season\SeasonSimulation;

/**
 * Teams initialisation.
 */
$leagueTeams = [
    /**
     * @see https://www.premierleague.com/clubs/4/Chelsea/stats?se=363
     */
    new SeasonResult(new Team('Chelsea', 0.8, new SeasonStats(2.5, 1.25))),

    /**
     * @see https://www.premierleague.com/clubs/38/Wolverhampton-Wanderers/stats?se=363
     */
    new SeasonResult(new Team('Wolverhampton Wanderers', 0.25, new SeasonStats(1, 1.13))),

    /**
     * @see https://www.premierleague.com/clubs/11/Manchester-City/stats?se=363
     */
    new SeasonResult(new Team('Manchester City', 0.9, new SeasonStats(1.5, 1.5))),

    /**
     * @see https://www.premierleague.com/clubs/21/Tottenham-Hotspur/stats?se=363
     */
    new SeasonResult(new Team('Tottenham Hotspur', 0.6, new SeasonStats(2.38, 1.13))),
];

$seasonSimulation = new SeasonSimulation($leagueTeams);
$seasonSimulation->play();

$seasonReport = new SeasonReport($leagueTeams);
$seasonReport->printTable();
