<?php

namespace HeroGame\GameEngine;

use HeroGame\Characters\Orderus;
use HeroGame\Characters\Beast;

class Gameplay
{
    protected $orderus;

    protected $beast;

    protected $currentAttacker;

    protected $attacker;

    protected $defender;

    protected $roundsPlayed;

    const MAX_BATTLE_ROUNDS = 20;
    const PLAYABLE_CHAR_NAME = 'Orderus';
    const NPC_NAME = 'Beast';

    public function __construct()
    {
        $this->beast = new Beast();
        $this->orderus = new Orderus();
        $this->roundsPlayed = 0;
        $this->startGame();
    }

    protected function setInitialAttacker()
    {
        if ($this->orderus->getSpeed() > $this->beast->getSpeed()) {
            $this->attacker = $this->orderus;
            $this->defender = $this->beast;
            return false;
        }

        if ($this->orderus->getSpeed() < $this->beast->getSpeed()) {
            $this->attacker = $this->beast;
            $this->defender = $this->orderus;
            return false;
        }

        if ($this->orderus->getLuck() > $this->beast->getLuck()) {
            $this->attacker = $this->orderus;
            $this->defender = $this->beast;
            return false;
        }

        if ($this->orderus->getLuck() < $this->beast->getLuck()) {
            $this->attacker = $this->beast;
            $this->defender = $this->orderus;
            return false;
        }

        $this->attacker = $this->orderus;
        $this->defender = $this->beast;

    }

    public function swapRoles(){
        $currentAttacker = $this->attacker;
        $currentDefender = $this->defender;

        $this->attacker = $currentDefender;
        $this->defender = $currentAttacker;
    }

    public function startGame()
    {
        $this->displayInitialStats($this->beast, $this->orderus);
        $this->setInitialAttacker();

        while ($this->attacker->isAlive() && $this->defender->isAlive() && $this->roundsPlayed < self::MAX_BATTLE_ROUNDS) {
            $this->roundsPlayed += 1;
            echo('Round '. $this->roundsPlayed . ' begins');
            echo '<br>';
            echo '<br>';

            $currentRound = new Round($this->attacker, $this->defender);
            $this->swapRoles();
        }
        if($this->roundsPlayed >= self::MAX_BATTLE_ROUNDS){
            echo "GAME OVER - ".self::MAX_BATTLE_ROUNDS." rounds were played! <br/>";
            if($this->attacker->getHealth() > $this->defender->getHealth()){
                echo "Winner is " . $this->attacker->getName();
            }elseif($this->attacker->getHealth() < $this->defender->getHealth()){
                echo "Winner is " . $this->defender->getName();
            }else{
                echo "The match ended as a draw";
            }
        } elseif($this->attacker->isAlive()){
            echo('GAME OVER <br>' . $this->attacker->getName() . ' - won the fight!');
        }else{
            echo('GAME OVER <br/>' . $this->defender->getName() . ' - won the fight!');
        }
    }

    private function displayInitialStats($beast, $orderus)
    {
        echo "Orderus stats: <br/>";
        echo "Strength: ".$orderus->getStrength()."<br/>";
        echo "Health: ".$orderus->getHealth()."<br/>";
        echo "Defence: ".$orderus->getDefence()."<br/>";
        echo "Speed: ".$orderus->getSpeed()."<br/>";
        echo "Luck: ".$orderus->getLuck()."<br/>";
        echo "<br/>";
        echo "Beast stats: <br/>";
        echo "Strength: ".$beast->getStrength()."<br/>";
        echo "Health: ".$beast->getHealth()."<br/>";
        echo "Defence: ".$beast->getDefence()."<br/>";
        echo "Speed: ".$beast->getSpeed()."<br/>";
        echo "Luck: ".$beast->getLuck()."<br/>";
        echo "<br/>";
    }
}