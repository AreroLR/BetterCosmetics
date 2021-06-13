<?php

namespace Skylelo\BetterCosmetics;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\item\Item;
use Skylelo\BetterCosmetics\Main;

class PlayerJoinEvent implements Listener
{
    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onPlayerInteraction(PlayerInteractEvent $event)
    {
        $item = $event->getPlayer()->getInventory()->getItemInHand()->getName();
        $player = $event->getPlayer();

        if ($item == $this->plugin->cfg->get("itemName")) {
            $this->plugin->particlesUI($player);
        }
    }

    public function onJoin(\pocketmine\event\player\PlayerJoinEvent $event) {

        $player = $event->getPlayer();

        $player->getInventory()->setItem($this->plugin->cfg->get("inventorySlot"), Item::get($this->plugin->cfg->get("itemId"))->setCustomName($this->plugin->cfg->get("itemName")));

    }

}
