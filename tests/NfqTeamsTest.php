<?php

namespace App\Tests;

use App\Services\NfqTeams;
use PHPUnit\Framework\TestCase;

class NfqTeamsTest extends TestCase
{
    /** @var NfqTeams */
    private $twoTeams = null;


    //setting $twoTeams, function firstly called when test is called
    public function setUp()
    {
        $this->twoTeams = new NfqTeams(
            [
                'academyui' => [
                    'mentors' => ['Jonas Jonaitis'],
                    'students' => ['Petras Petraitis', 'Gedas Gražauskas'],
                ],
                'supperreal' => [
                    'mentors' => ['Vardenis Pavardenis', 'Ada Kalbenė'],
                    'students' => ['Vytautas Vėjūnas'],
                ],
            ]
        );
    }


    public function testEmpty()
    {
        $teams = new NfqTeams([]);
        $this->assertNull($teams->getTeamByMember('notExisting'));
        $this->assertNull($teams->getTeamByMentor('notExisting'));
    }


    public function providerValidMentors()
    {
        return [
            'one of one' => ['academyui', 'Jonas Jonaitis'],
            'last one' => ['supperreal', 'Ada Kalbenė']
        ];
    }

    public function providerValidMembers()
    {
        return [
            'one of one' => ['supperreal', 'Vytautas Vėjūnas'],
            'last one' => ['academyui', 'Gedas Gražauskas']
        ];
    }


    /**
     * @dataProvider providerValidMentors
     * @param string $expectedTeam
     * @param string $actualName
     */
     public function testValidMentor($expectedTeam, $actualName)
    {
        $teams = $this->twoTeams;
        $this->assertEquals($expectedTeam, $teams->getTeamByMentor($actualName));
    }


    /**
     * @dataProvider providerValidMembers
     * @param string $expectedTeam
     * @param string $actualName
     */
    public function testValidMember($expectedTeam, $actualName)
    {
        $teams = $this->twoTeams;
        $this->assertEquals($expectedTeam, $teams->getTeamByMember($actualName));
    }


    public function testInvalidMember()
    {
        $teams = $this->twoTeams;
        $this->assertNull($teams->getTeamByMember('Neegzistuojantis'));
    }

    public function testInvalidMentor()
    {
        $teams = $this->twoTeams;
        $this->assertNull($teams->getTeamByMentor('Neegzistuojantis'));
    }
}

