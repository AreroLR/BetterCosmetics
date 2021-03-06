<?php

namespace Skylelo\BetterCosmetics\Particles;

use pocketmine\math\Vector3;
use pocketmine\level\particle\{GenericParticle, Particle};

class InkParticles extends GenericParticle
{
    public function __construct(Vector3 $pos)
    {
        parent::__construct($pos, Particle::TYPE_INK);
    }
}
