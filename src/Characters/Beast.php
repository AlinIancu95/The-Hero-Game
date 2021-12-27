<?php

namespace HeroGame\Characters;
use HeroGame\Characters\Character as Character;
use HeroGame\GameEngine\Gameplay;

class Beast extends Character
{
    /**
     * Beast constructor.
     */
    public function __construct()
    {
        $this->setName(Gameplay::NPC_NAME);

        $this->setHealth(mt_rand(70, 100));

        $this->setStrength(mt_rand(70, 80));

        $this->setDefence(mt_rand(45, 55));

        $this->setSpeed(mt_rand(40, 50));

        $this->setLuck(mt_rand(10, 30));
    }
}