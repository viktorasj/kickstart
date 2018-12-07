<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 14.43
 */

namespace App\Services;


class NfqTeams implements TeamsInterface
{
    private $data = [];


    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getTeamByMember(string $name): ?string
    {
        return null;
    }

    public function getTeamByMentor(string $name): ?string
    {
        return null;
    }
}