<?php

namespace HeroGame\Skills;
use HeroGame\Skills\Skill as Skill;

class RapidStrike extends Skill
{
    public static function getEffect($attacker, $defender)
    {
        if(rand(1, 100) <= 10) {
            echo($attacker->getName(). ' instincts kick in! His attack values increase with Rapid Strike!'. ' ');
            $attacker->setCurrentRoundAttack(($attacker->getStrength() - $defender->getDefence()) * 2);
            return true;
        }

        return false;
    }
}