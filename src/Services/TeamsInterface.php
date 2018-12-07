<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 14.39
 */

namespace App\Services;

interface TeamsInterface {
    public function getTeamByMember (string $name): ?string;
    public function getTeamByMentor (string $name): ?string;
}