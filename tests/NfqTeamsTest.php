<?php

namespace App\Tests;

use App\Services\NfqTeams;
use PHPUnit\Framework\TestCase;

class NfqTeamsTest extends TestCase
{
    public function testEmpty()
    {
        $teams = new NfqTeams([]);
        $this->assertNull($teams->getTeamByMember('not Existing'));
        $this->assertNull($teams->getTeamByMentor('not Existing'));
    }
}
