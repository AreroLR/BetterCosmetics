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
    private static $instance = null;

    public function onLoad()
    {
        $this->saveDefaultConfig();
    }

    public function onEnable(): void
    {
        $this->getLogger()->info("BetterCosmetics has been successfully enabled!");

        self::$instance = $this;

        $cfg = $this->getConfig();

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}