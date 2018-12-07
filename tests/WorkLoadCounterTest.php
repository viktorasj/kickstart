<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 22.08
 */

namespace App\Tests;

use App\Services\TeamsInterface;
use PHPUnit\Framework\MockObject\MockObject;
use App\Services\NfqTeams;
use App\Services\WorkLoadCounter;
use PHPUnit\Framework\TestCase;


class WorkLoadCounterTest
{
    public function testOneMentorHelpsMultipleTeams()
    {

        $teams = $this->createMock(TeamsInterface::class);
        $teams->expects($this->exactly(2))
            ->method('getTeamByMentor')
            ->willReturn('a');


        $workLoadCounter = new WorkLoadCounter($teams, ['Jonas','Petras']);
        $this->assertEuals(2, $workLoadCounter->studentCount('a'));

    }
}