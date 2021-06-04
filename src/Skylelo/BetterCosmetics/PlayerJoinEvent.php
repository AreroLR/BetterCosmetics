<?php

namespace Skylelo\BetterCosmetics;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

use Skylelo\BetterCosmetics\Main;

class JoinEvent implements Listener
{
    public $plugin;

    public function __construct(BetterCosmetics $plugin)
    {
        $this->plugin = $plugin;
        $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
    }

    public function onPlayerInteraction(PlayerInteractEvent $event)
    {
        $item = $event->getPlayer()->getInventory()->getItemInHand()->getName();
        $player = $event->getPlayer();

        if ($item == $this->cfg->get("itemName")) {
            $this->plugin->particlesUI($player);
        }
    }
}