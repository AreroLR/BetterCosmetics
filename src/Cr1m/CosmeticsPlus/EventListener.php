<?php

namespace Cr1m\CosmeticsPlus;

use Cr1m\CosmeticsPlus\Main;
use Cr1m\CosmeticsPlus\Pet;
use Cr1m\CosmeticsPlus\Forms\Form;
use Cr1m\CosmeticsPlus\Forms\FormUI;
use Cr1m\CosmeticsPlus\Forms\ModalForm;
use Cr1m\CosmeticsPlus\Forms\SimpleForm;
use Cr1m\CosmeticsPlus\Forms\CustomForm;

use pocketmine\entity\Entity;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\event\Listener;

class EventListener implements Listener
{

    public $plugin;

    public function __construct(Main $plugin)

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

                            $this->petOptionHuman($player);

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

    public function petOptionHuman(Player $pl): void
    {
        $form = $this->plugin->createSimpleForm(function (Player $player, ?int $data) {
            if (!is_null($data)) {
                switch ($data) {

                    case 0:
                        $this->listHumanPet($player);
                        break;

                    case 1:
                        $this->plugin->removePetUIT($player);
                        break;
                    default:
                        return;

                }
            }
        });

        $form->setTitle("§6§lMINI ME");
        $form->addButton("§l§fEQUIP");
        $form->addButton("§l§cUNEQUIP");
        $form->sendToPlayer($pl);

    }

    public function listHumanPet(Player $pl)
    {

        $form = $this->plugin->createSimpleForm(function (Player $pl, ?int $data) {

            if (!is_null($data)) {

                $all = $this->plugin->onlyHuman[$pl->getName()] ?? "value";


                $vote = $all[$data];

                $online = Core::getInstance()->getServer()->getPlayer($vote);
                if ($online != null) {
                    $this->plugin->removePetUIT($pl);
                    $this->plugin->addUserPet($pl, "human");
                    $nbt = Entity::createBaseNBT(new Vector3($pl->x, $pl->y + 0.3, $pl->z), null, 88, 6);
                    $skinTag = $online->namedtag->getCompoundTag("Skin");
                    assert($skinTag !== null);
                    $nbt->setTag(clone $skinTag);
                    $entity = Entity::createEntity("Pet", $pl->getLevel(), $nbt);
                    $entity->setScale(0.5);
                    $entity->setScoreTag($online->getName() . "§6's pet");
                    $entity->setOwningEntity($pl);
                    $entity->spawnToAll();

                    $pl->sendMessage("§a(!) Successfully spawned pet!");

                } else {
                    $pl->sendMessage("§c(!) Your pet was unequipped.");

                       }
                if (isset($this->plugin->onlyHuman[$pl->getName()])) {
                    unset($this->plugin->onlyHuman[$pl->getName()]);
                }
            }
        });
    }
}


