<?php

namespace Helex\CosmeticsPlus\Particles;

use pocketmine\math\Vector3;
use pocketmine\level\particle\{GenericParticle, Particle};

class SnowParticles extends GenericParticle
{
    public function __construct(Vector3 $pos)
    {
        parent::__construct($pos, Particle::TYPE_SNOWBALL_POOF);
    }
}
