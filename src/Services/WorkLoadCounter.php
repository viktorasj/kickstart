<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 22.03
 */

namespace App\Services;


class WorkLoadCounter
{
    private $teamProvider = null;

    private $availableMentors = [];



    public function __construct(TeamsInterface $teamProvider, array  $availableMentors)
    {
        $this->teamProvider = $teamProvider;
        $this->availableMentors = $availableMentors;
    }

    public function studentCount (string $team): int
    {
        $sum = 0;
        foreach ($this->avalableMentors as $mentor){
            if($this->teamsProvider->getTeamByMentor($mentor) == $team){
                $sum++;
            }
        }
        return $sum;
    }
}