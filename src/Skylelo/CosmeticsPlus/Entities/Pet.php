<?php

namespace Helex\CosmeticsPlus\Entities;

use Helex\CosmeticsPlus\Main;

use pocketmine\entity\Human;
use pocketmine\Player;

class Pet extends Human
{

    protected $cooldown;
    protected $cooldownUp = false;


    public function entityBaseTick(int $tickDiff = 1): bool
    {
        $player = $this->getOwningEntity() == null ? $this->kill() : $this->getOwningEntity();
        if ($player instanceof Player) {
            $online = Main::getInstance()->getServer()->getPlayer($player->getName());
            if ($online != null) {
                $xDiff = $player->x - $this->x;
                $zDiff = $player->z - $this->z;
                $totalDiff = abs($xDiff) + abs($zDiff);
                if (intval($this->getY()) < 0) {
                    $this->teleport($player);
                } else if ($this->distance($player) >= 2.2 && $this->distance($player) <= 10) {
                    $totalDiff = abs($xDiff) + abs($zDiff);
                    if ($xDiff != 0 && $zDiff != 0) {
                        $this->motion->x = 1.2 * 0.25 * ($xDiff / $totalDiff);
                        $this->motion->z = 1.2 * 0.25 * ($zDiff / $totalDiff);
                        $this->lookAt($player);
                    }
                } else if ($this->distance($player) >= 11) {
                    $this->teleport($player);
                } else if ($this->distance($player) >= 0.9 && $this->distance($player) <= 1.9) {

                    $this->lookAt($player);
                }

            } else {
                $this->kill();
            }
        }

        return parent::entityBaseTick($tickDiff);
    }

}
