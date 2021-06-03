<?php

namespace Skylelo\BetterCosmetics\Particles;

use pocketmine\level\particle\Particle;
use pocketmine\level\particle\GenericParticle;
use pocketmine\math\Vector3;

class MusicNoteParticles extends GenericParticle
{
    public function __construct(Vector3 $pos, $r, $g, $b, $a = 255)
    {
        parent::__construct($pos, Particle::TYPE_NOTE, (($a & 0xff) << 24) | (($r & 0xff) << 16) | (($g & 0xff) << 8) | ($b & 0xff));
    }
}