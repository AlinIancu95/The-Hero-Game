<?php

namespace HeroGame\Characters;

abstract class Character
{
    protected $name;

    protected $health;

    protected $strength;

    protected $defence;

    protected $speed;

    protected $luck;

    protected $damageToBeReceived = 0;

    protected $currentRoundAttack = 0;

    protected $offensiveSkills = [];

    protected $defensiveSkills = [];

    /**
     * @return int
     */
    public function getCurrentRoundAttack()
    {
        return $this->currentRoundAttack;
    }

    /**
     * @param int $currentRoundAttack
     */
    public function setCurrentRoundAttack($currentRoundAttack)
    {
        $this->currentRoundAttack = $currentRoundAttack;
    }

    /**
     * @return mixed
     */
    public function getDamageToBeReceived()
    {
        return $this->damageToBeReceived;
    }

    /**
     * @param mixed $damageToBeReceived
     */
    public function setDamageToBeReceived($damageToBeReceived)
    {
        $this->damageToBeReceived = $damageToBeReceived;
    }

    /**
     * @return mixed
     */
    public function getOffensiveSkills()
    {
        return $this->offensiveSkills;
    }

    /**
     * @param mixed $offensiveSkills
     */
    public function setOffensiveSkills($offensiveSkills)
    {
        $this->offensiveSkills = $offensiveSkills;
    }

    /**
     * @return mixed
     */
    public function getDefensiveSkills()
    {
        return $this->defensiveSkills;
    }

    /**
     * @param mixed $defensiveSkills
     */
    public function setDefensiveSkills($defensiveSkills)
    {
        $this->defensiveSkills = $defensiveSkills;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    public function isAlive()
    {
        return (int)$this->getHealth() > 0;
    }
}