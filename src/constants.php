<?php

namespace App;

class Games{
    const LEAGUE_OF_LEGENDS = 1;
    const RAINBOW_SIX = 2;

    const GAMES = [
        'leagueoflegends'=>self::LEAGUE_OF_LEGENDS,
        'r6s'=>self::RAINBOW_SIX,
    ];
}

class Difficulty{
    const EASY = 1;
    const MEDIUM = 2;
    const HARD = 3;

    const DIFFICULTIES = [
        'facile' => self::EASY,
        'moyen' => self::MEDIUM,
        'difficile' => self::HARD
    ];

}

class constants{

}