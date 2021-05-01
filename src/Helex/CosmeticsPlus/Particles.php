<?php

namespace Helex\CosmeticsPlus;

use Helex\CosmeticsPlus\Forms\{FormUI, CustomForm, Form, ModalForm, SimpleForm};
use Helex\CosmeticsPlus\Entities\Pet;
use Helex\CosmeticsPlus\Particles\{DustParticles,
    EndParticles,
    FireworkParticles,
    HeartParticles,
    InkParticles,
    MusicNoteParticles,
    RainParticles,
    SlimeParticles,
    SmokeParticles,
    SnowParticles,
    TotemParticles
};

use pocketmine\entity\EntityIds;
use pocketmine\scheduler\PluginTask;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\{LevelEventPacket, LevelSoundEventPacket};

trait Particles
{

    public function getParticlesUI(Player $player)
    {
        if ($player->hasPermission("cosmeticsplus.particles")) {
            $form = $this->createSimpleForm(function (Player $player, ?int $data) {
                if (!is_null($data)) {
                    switch ($data) {
                        case 0:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "DustParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "DustParticles";
                                $player->sendMessage("§a(!) §7Dust §fparticles equipped!");
                            }
                            break;
                        case 1:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "EndParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "EndParticles";
                                $player->sendMessage("§a(!) §5End §fparticles equipped!");
                            }
                            break;
                        case 2:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "FireworkParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "FireworkParticles";
                                $player->sendMessage("§a(!) §6Firework §fParticles equipped!");
                            }
                            break;
                        case 3:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "HeartParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "HeartParticles";
                                $player->sendMessage("§a(!) §dHeart §fparticles equipped!");
                            }
                            break;
                        case 4:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "InkParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "InkParticles";
                                $player->sendMessage("§a(!) §1Ink §fparticles equipped!");
                            }
                            break;
                        case 5:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "MusicNoteParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "MusicNoteParticles";
                                $player->sendMessage("§a(!) §5bMusicNote §fparticles equipped!");
                            }
                            break;
                        case 6:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "RainParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "RainParticles";
                                $player->sendMessage("§a(!) §3Rain §fparticles equipped!");
                            }
                            break;
                        case 7:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $this->cpParticles[$player->getName()] = "SlimeParticles";
                                $player->getLevel()->broadcastLevelEvent($player, LevelEventPacket::EVENT_SOUND_TOTEM);
                            } else {
                                $player->getLevel()->broadcastLevelEvent($player, LevelEventPacket::EVENT_SOUND_TOTEM);
                                $this->cpParticles[$player->getName()] = "SlimeParticles";
                                $player->sendMessage("§a(!) §2Slime §fparticles equipped!");
                            }
                            break;
                        case 8:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "SnowParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->cpParticles[$player->getName()] = "SnowParticles";
                                $player->sendMessage("§a(!)§fSnow particles equipped!");
                            }
                            break;

                        case 9:
                            if (isset($this->cpParticles[$player->getName()])) {
                                unset($this->cpParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $player->sendMessage("§c(!) ALL particles unequipped!");
                            }
                            break;
                        default:
                            return;
                    }
                }
            });
            $form->setTitle("§b§lPARTICLES");
            $form->addButton("§l§9DUST PARTICLES", 0);
            $form->addButton("§l§9END PARTICLES", 0);
            $form->addButton("§l§9FIREWORK PARTICLES", 0);
            $form->addButton("§l§9HEART PARTICLES", 0);
            $form->addButton("§l§9INK PARTICLES", 0);
            $form->addButton("§l§9MUSICNOTE PARTICLES", 0);
            $form->addButton("§l§9RAIN PARTICLES", 0);
            $form->addButton("§l§9SLIME PARTICLES", 0);
            $form->addButton("§l§9SMOKE PARTICLES", 0);
            $form->addButton("§l§9SNOW PARTICLES", 0);
            $form->addButton("§l§9TOTEM PARTICLES", 0);
            $form->sendToPlayer($player);
        } else {
            $player->sendMessage("§c(!)§f It looks like you don't have permission to use that!");
        }
    }

    public function getPetUI(Player $player) {
        if($player->hasPermission("cosmeticsplus.pets")) {
            $form = $this->createSimpleForm(function(Player $player, ?int $data){
                if( !is_null($data)) {
                    switch($data) {
                        case 1:
                            $player->sendMessage("§a(!) §2You have equipped the§e ".$this->setPetID($player,EntityIds::CHICKEN). "§2pet");
                            break;
                        case 2:
                            $player->sendMessage("§a(!) §2You have equipped the§e ".$this->setPetID($player,EntityIds::CAT). "§2pet");
                            break;
                        default:
                            return;
                    } } });
            $form->setTitle("§3§lPETS");
            $form->addButton("§l§6CHICKEN",0);
            $form->addButton("§l§6CAT",0);
            $form->sendToPlayer($player);
        } else {
            $player->sendMessage("§c(!)§f It looks like you don't have permission to use that!");
        }
    }
}