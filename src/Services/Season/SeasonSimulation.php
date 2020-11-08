<?php
declare(strict_types=1);

namespace App\Services\Season;

use App\Exceptions\SeasonIsOverException;
use App\Models\Match\Match;
use App\Models\SeasonResult;
use App\Models\Team\AwayTeam;
use App\Models\Team\HomeTeam;
use App\Services\LeagueSchedule;
use App\Services\Match\MatchSimulation;

/**
 * Class SeasonSimulation
 *
 * @package App\Services\Season
 */
class SeasonSimulation
{
    protected array $leagueTeams = [];

    /**
     * SeasonSimulation constructor.
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
    public function play(): void
    {
        //TODO: ugly, but the simplest way to play the season (kinda wrote it on Sunday, so...).
        for ($i = 1; $i <= count($this->leagueTeams); $i++) {
            foreach ($this->leagueTeams as $homeLeagueTeam) { //fixme: one team can play twice per match day
                try {
                    $awayLeagueTeam = (new LeagueSchedule($this->leagueTeams))->findOpponent($homeLeagueTeam);

                    $match = new Match(
                        new HomeTeam($homeLeagueTeam->getTeam()),
                        new AwayTeam($awayLeagueTeam->getTeam()),
                    );

                    $matchSimulation = new MatchSimulation($match);
                    $matchSimulation->play();

                    $this->updateHomeTeamSeasonResult($homeLeagueTeam, $matchSimulation);
                    $this->updateAwayTeamSeasonResult($awayLeagueTeam, $matchSimulation);
                } catch (SeasonIsOverException $seasonIsOverException) {}
            }
        }
    }

    /**
     * @param  SeasonResult     $seasonResult
     * @param  MatchSimulation  $matchSimulation
     *
     * @return void
     */
    protected function updateHomeTeamSeasonResult(SeasonResult $seasonResult, MatchSimulation $matchSimulation): void
    {
        $matchResult = $matchSimulation->getResult();

        $seasonResult->addOpponent($matchResult->getAwayTeam());
        $seasonResult->addPoints($matchResult->getHomeTeamPoints());
        $seasonResult->addPlayed();

        if ($matchResult->getHomeTeamPoints() === 3) {
            $seasonResult->addWon();
        }

        if ($matchResult->getHomeTeamPoints() === 1) {
            $seasonResult->addWon();
        }

        if ($matchResult->getHomeTeamPoints() === 0) {
            $seasonResult->addLoss();
        }

        $seasonResult->adjustScoredGoals($matchResult->getHomeTeamScoredGoals());
        $seasonResult->adjustConcededGoals($matchResult->getAwayTeamScoredGoals());
        $seasonResult->adjustGoalDifference(
            $matchResult->getHomeTeamScoredGoals() - $matchResult->getAwayTeamScoredGoals()
        );
    }

    /**
     * @param  SeasonResult     $seasonResult
     * @param  MatchSimulation  $matchSimulation
     *
     * @return void
     */
    protected function updateAwayTeamSeasonResult(SeasonResult $seasonResult, MatchSimulation $matchSimulation): void
    {
        $matchResult = $matchSimulation->getResult();

        $seasonResult->addOpponent($matchResult->getHomeTeam());
        $seasonResult->addPoints($matchResult->getAwayTeamPoints());
        $seasonResult->addPlayed();

        if ($matchResult->getAwayTeamPoints() === 3) {
            $seasonResult->addWon();
        }

        if ($matchResult->getAwayTeamPoints() === 1) {
            $seasonResult->addDraw();
        }

        if ($matchResult->getAwayTeamPoints() === 0) {
            $seasonResult->addLoss();
        }

        $seasonResult->adjustScoredGoals($matchResult->getAwayTeamScoredGoals());
        $seasonResult->adjustConcededGoals($matchResult->getHomeTeamScoredGoals());
        $seasonResult->adjustGoalDifference(
            $matchResult->getAwayTeamScoredGoals() - $matchResult->getHomeTeamScoredGoals()
        );
    }
}