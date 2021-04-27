<?php

namespace Core\events;

use Cr1m\CosmeticsPlus\Main;
use Cr1m\CosmeticsPlus\Pet;
use Cr1m\CosmeticsPlus\Forms\{Form, FormUI, ModalForm, SimpleForm, CustomForm};

use pocketmine\Player;
use pocketmine\event\Listener;

class EventListener implements Listener
{

    public $plugin;

    public function __construct(Cr1m\CosmeticsPlus\Main $plugin)
    {

        $this->plugin = $plugin;
        $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
    }

    public function addNewOption(Player $pl): void
    {

        $form = $this->plugin->createSimpleForm(function (Player $player, ?int $data) {
            if (!is_null($data)) {
                switch ($data) {
                    case 0:
                        if ($player->hasPermission("cosmeticsplus.3dpets")) {
                            $this->plugin->getPetUI4D($player);

                        } else {

                            $player->sendMessage("§c(!)§f It looks like you don't have permission to use that!");

                        }

                        break;
                    case 1:
                        if ($player->hasPermission("cosmeticsplus.minime")) {

                            $this->petOptionHumam($player);

                        } else {

                            $player->sendMessage("§c(!)§f It looks like you don't have permission to use that!");

                        }

                        break;
                    default:
                        return;

                }
            }
        });

        $form->setTitle("§6§l>> PETS <<");
        $form->addButton("§l§fPETS");
        $form->addButton("§l§fMINI ME");
        $form->sendToPlayer($pl);

    }
}


