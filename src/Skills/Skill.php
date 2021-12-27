<?php

namespace HeroGame\Skills;

abstract class Skill
{
    public static abstract function getEffect($attacker, $defender);
}