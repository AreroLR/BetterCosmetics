<?php

declare(strict_types=1);

namespace Skylelo\BetterCosmetics;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;

use Skylelo\BetterCosmetics\Particles;
use Skylelo\BetterCosmetics\Forms\{FormUI, CustomForm, Form, ModalForm, SimpleForm};

class Main extends PluginBase implements Listener
{
    use FormUI, Particles;

    public $bcParticles = [];

    public function onLoad()
    {
        self::setInstance($this);
        $this->saveDefaultConfig();
    }

    public function onEnable(): void
    {
        $this->getLogger()->info("BetterCosmetics has been successfully enabled!");

        self::$instance = $this;

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $player)
    {
        $player->getInventory()->setItem($this->getConfig()->get("inventorySlot"), Item::get($this->getConfig()->get("itemId"), 0, 1)->setCustomName($this->getConfig()->get("itemName")));
    }

    public function onPlayerInteractOn(PlayerInteractEvent $event)
    {
        $item = $event->getPlayer()->getInventory()->getItemInHand()->getName();
        $player = $event->getPlayer();

        if ($item == $this->getConfig()->get("itemName")) {
            $this->plugin->particlesUI($player);
        }
    }
}