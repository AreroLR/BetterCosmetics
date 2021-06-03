<?php

namespace Skylelo\BetterCosmetics;

use Skylelo\BetterCosmetics\Main;
use Skylelo\BetterCosmetics\Forms\{FormUI, CustomForm, Form, ModalForm, SimpleForm};
use Skylelo\BetterCosmetics\Particles\{DustParticles,
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

use pocketmine\scheduler\PluginTask;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\{LevelEventPacket, LevelSoundEventPacket};

trait Particles
{

    public function particlesUI(Player $player)
    {
        if ($player->hasPermission("bettercosmetics.particles")) {
            $form = $this->createSimpleForm(function (Player $player, ?int $data) {
                if (!is_null($data)) {
                    switch ($data) {
                        case 0:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "DustParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "DustParticles";
                                $player->sendMessage("§a(!) §7Dust §fparticles equipped!");
                            }
                            break;
                        case 1:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "EndParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "EndParticles";
                                $player->sendMessage("§a(!) §5End §fparticles equipped!");
                            }
                            break;
                        case 2:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "FireworkParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "FireworkParticles";
                                $player->sendMessage("§a(!) §6Firework §fParticles equipped!");
                            }
                            break;
                        case 3:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "HeartParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "HeartParticles";
                                $player->sendMessage("§a(!) §dHeart §fparticles equipped!");
                            }
                            break;
                        case 4:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "InkParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "InkParticles";
                                $player->sendMessage("§a(!) §1Ink §fparticles equipped!");
                            }
                            break;
                        case 5:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "MusicNoteParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "MusicNoteParticles";
                                $player->sendMessage("§a(!) §5bMusicNote §fparticles equipped!");
                            }
                            break;
                        case 6:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "RainParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "RainParticles";
                                $player->sendMessage("§a(!) §3Rain §fparticles equipped!");
                            }
                            break;
                        case 7:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $this->bcParticles[$player->getName()] = "SlimeParticles";
                                $player->getLevel()->broadcastLevelEvent($player, LevelEventPacket::EVENT_SOUND_TOTEM);
                            } else {
                                $player->getLevel()->broadcastLevelEvent($player, LevelEventPacket::EVENT_SOUND_TOTEM);
                                $this->bcParticles[$player->getName()] = "SlimeParticles";
                                $player->sendMessage("§a(!) §2Slime §fparticles equipped!");
                            }
                            break;
                        case 8:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "SnowParticles";
                            } else {
                                $player->getLevel()->broadcastLevelSoundEvent($player, LevelSoundEventPacket::SOUND_BOTTLE_DRAGONBREATH);
                                $this->bcParticles[$player->getName()] = "SnowParticles";
                                $player->sendMessage("§a(!)§fSnow particles equipped!");
                            }
                            break;

                        case 9:
                            if (isset($this->bcParticles[$player->getName()])) {
                                unset($this->bcParticles[$player->getName()]);
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
            $form->addButton("§l§9MUSIC NOTE PARTICLES", 0);
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
}