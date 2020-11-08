<?php
declare(strict_types=1);

namespace App\Helpers\Season;

use App\Models\SeasonResult;

/**
 * Class ConsoleOutput
 *
 * @package App\Helpers\Season
 */
class ConsoleOutput
{
    protected SeasonResult $seasonResult;

    /**
     * ConsoleOutput constructor.
     *
     * @param SeasonResult $seasonResult
     */
    public function __construct(SeasonResult $seasonResult)
    {
        $this->seasonResult = $seasonResult;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        //TODO: twig
        return vsprintf(
            "\n%s %d,  %d,  %d,  %d,  %d,  %d,  %d,  %d",
            [
                str_pad($this->seasonResult->getTeam()->getName(), 25, ' '),
                $this->seasonResult->getPoints(),
                $this->seasonResult->getPlayed(),
                $this->seasonResult->getWon(),
                $this->seasonResult->getDraw(),
                $this->seasonResult->getLoss(),
                $this->seasonResult->getScoredGoals(),
                $this->seasonResult->getConcededGoals(),
                $this->seasonResult->getGoalDifference(),
            ]
        );
    }
}