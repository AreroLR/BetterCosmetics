<?php

namespace Skylelo\BetterCosmetics\Particles;

use pocketmine\math\Vector3;
use pocketmine\level\particle\{GenericParticle, Particle};

class DustParticles extends GenericParticle
{
    public function __construct(Vector3 $pos, $r, $g, $b, $a = 255)
    {
        parent::__construct($pos, Particle::TYPE_MOB_SPELL_INSTANTANEOUS, (($a & 0xff) << 24) | (($r & 0xff) << 16) | (($g & 0xff) << 8) | ($b & 0xff));
    }
}
