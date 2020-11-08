<?php
declare(strict_types=1);

namespace App\Models\Team;

use App\Models\SeasonStats;

/**
 * Class Team
 *
 * @package App\Models\Team
 */
class Team
{
    protected string $name;

    protected array $players;

    protected float $clubValue;

    protected float $morale = 1;

    protected SeasonStats $seasonStats;

    /**
     * Team constructor.
     *
     * @param string      $name
     * @param float       $clubValue
     * @param SeasonStats $seasonStats
     */
    public function __construct(string $name, float $clubValue, SeasonStats $seasonStats)
    {
        $this->name        = $name;
        $this->clubValue   = $clubValue;
        $this->seasonStats = $seasonStats;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getClubValue(): float
    {
        return $this->clubValue;
    }

    /**
     * @return float
     */
    public function getMorale(): float
    {
        return $this->morale;
    }

    /**
     * @param float $morale
     */
    public function setMorale(float $morale): void
    {
        $this->morale = $morale;
    }

    /**
     * @param  float  $coefficient
     *
     * @return void
     */
    public function adjustMorale(float $coefficient): void
    {
        $this->setMorale($this->getMorale() * $coefficient);
    }

    /**
     * @return SeasonStats
     */
    public function getSeasonStats(): SeasonStats
    {
        return $this->seasonStats;
    }
}