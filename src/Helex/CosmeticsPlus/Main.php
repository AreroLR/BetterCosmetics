<?php

declare(strict_types=1);

namespace Helex\CosmeticsPlus;

use pocketmine\entity\Entity;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;

USE Helex\CosmeticsPlus\Forms\FormUI;
use Helex\CosmeticsPlus\Forms\Form;
use Helex\CosmeticsPlus\EventListener;
use Helex\CosmeticsPlus\Pets;
use Helex\CosmeticsPlus\Particles;

class Main extends PluginBase implements Listener
{

    use FormUI, Pets, Particles;

    public $cpParticles = [];

    public $threeDimensionalPets = [
        "Wolf/wolf.png",
        "Wolf/wolf.json",
        "Caterpillar/caterpillar.json",
        "Caterpillar/caterpillar.png"
    ];

    public function onLoad()
    {
        self::setInstance($this);
        $this->saveDefaultConfig();
    }

    public function onEnable(): void
    {
        self::$instance = $this;
        Entity::registerEntity(Pet::class, true);

        foreach ($this->threeDimensionalPets as $file) {
            $this->saveResource($file);
        }

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

}