<?php

namespace HeroGame\GameEngine;

class Round
{
    public function __construct($attacker, $defender)
    {
        $attacker->setCurrentRoundAttack($attacker->getStrength());
        $defender->setDamageToBeReceived(0);

        $attackSkillApplied = $this->applyAttackerSkills($attacker, $defender);

        if(rand(1,100) > $defender->getLuck()) {
            if($attackSkillApplied){
                $damageAfterReduction = $attacker->getCurrentRoundAttack();
            }else{
                $damageAfterReduction = ($attacker->getCurrentRoundAttack() - $defender->getDefence()) > 0 ? $attacker->getCurrentRoundAttack() - $defender->getDefence() : 0;
            }

            echo($attacker->getName(). ' readies his attack!'.' ' . 'Damage dealt is ' . $damageAfterReduction . '. ');
            $defender->setDamageToBeReceived($damageAfterReduction);
            $this->applyDefenderSkills($attacker,$defender);
            $defender->setHealth($defender->getHealth() - $defender->getDamageToBeReceived());
            echo('<br/>'.$defender->getName(). ' health is now '. $defender->getHealth());
            echo '<br>';
            echo '<br>';

        } else {
            echo($attacker->getName() .' '. 'attack missed!');
            echo '<br>';
            echo '<br>';
        }
    }

    private function applyAttackerSkills($attacker, $defender)
    {
        $attackSkills = $attacker->getOffensiveSkills();
        $nrOfSkillsApplied = 0;

        foreach($attackSkills as $skill){
            if($skill::getEffect($attacker, $defender)){
                $nrOfSkillsApplied++;
            }
        }

        if($nrOfSkillsApplied > 0){
            return true;
        }

        return false;
    }

    private function applyDefenderSkills($attacker,$defender)
    {
        $defenderSkills = $defender->getDefensiveSkills();

        foreach($defenderSkills as $skill){
            $skill::getEffect($attacker, $defender);
        }
    }
}