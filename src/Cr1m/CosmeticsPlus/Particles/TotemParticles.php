<?php

namespace Cr1m\CosmeticsPlus\Particles;

use pocketmine\math\Vector3;
use pocketmine\level\particle\{GenericParticle, Particle};

class TotemParticles extends GenericParticle
{
    public function __construct(Vector3 $pos)
    {
        parent::__construct($pos, Particle::TYPE_TOTEM);
    }
}
