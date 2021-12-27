<?php

namespace HeroGame\Skills;
use HeroGame\Skills\Skill as Skill;

class MagicShield extends Skill
{
    public static function getEffect($attacker, $defender)
    {
        if(rand(1,100) <= 20) {
            echo(
                $defender->getName(). ' instincts kick in! His defense values increase with Magic Shield! The damage
                was reduced to '.round($defender->getDamageToBeReceived() / 2)
            );
            return $defender->setDamageToBeReceived(round($defender->getDamageToBeReceived() / 2));
        }

        return false;
    }
}