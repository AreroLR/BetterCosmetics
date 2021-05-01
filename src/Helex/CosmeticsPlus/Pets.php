<?php

namespace Helex\CosmeticsPlus;

use Helex\CosmeticsPlus\Main;

use pocketmine\entity\{Entity, EntityIds};
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\RemoveActorPacket;
use pocketmine\Player;

trait Pets
{

    public function setPet(Player $player, int $type)
    {
        $this->delPet($player);
        $this->pet_basic[$player->getName()]["Count"] = Entity::$entityCount++;
        $pk = new AddActorPacket();
        $pk->type = $type;
        $pk->entityRuntimeId = $this->pet_basic[$player->getName()]["Count"];
        $pk->position = $player->asVector3();
        $pk->yaw = $player->getYaw();
        $pk->pitch = $player->getPitch();
        $player->getServer()->broadcastPacket([$player], $pk);
    }

    public function setPetID(Player $pl, int $int): string
    {
        switch ($int) {
            case EntityIds::CHICKEN:
                $this->setPet($pl, EntityIds::CHICKEN);
                return "Chicken";
                break;
            case EntityIds::RABBIT:
                $this->setPet($pl, EntityIds::RABBIT);
                return "Rabbit";
                break;
            default:
                break;
        }
    }

    public function removePet(Player $player)
    {
        if (isset($this->pet_basic[$player->getName()])) {
            $pk = new RemoveActorPacket();
            $pk->entityUniqueId = $this->pet_basic[$player->getName()]["Count"];
            $player->sendDataPacket($pk);
            $player->getServer()->broadcastPacket([$player], $pk);
            unset($this->pet_basic[$player->getName()]);
        }
    }
}
