<?php
namespace ChampOfGames\ExtraCommands;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\level\sound\PopSound;

class Main extends PluginBase
{

    public $fts = "§4[§bExtraCommands§4]";

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {

        if ($cmd->getName() == "food") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("food.use")) {
                    $sender->getInventory()->addItem(Item::get(297, 0, 8));
                    $sender->getlevel()->addSound(new PopSound($sender));
                    $sender->sendMessage($this->fts . TF::GREEN . "You have got bread!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . " You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "heal") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("heal.use")) {
                    $sender->setHealth(20);
                    $sender->sendMessage($this->fts . TF::GREEN . " Your health is full!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . " You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "feed") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("feed.use")) {
                    $sender->setFood(20);
                    $sender->sendMessage($this->fts . TF::GREEN . " Your food is full!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . " You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "gms") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("gms.use")) {
                    $sender->setGamemode(0);
                    $sender->sendMessage($this->fts . TF::GREEN . "You have set your gamemode to survival mode!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "gmc") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("gmc.use")) {
                    $sender->setGamemode(1);
                    $sender->sendMessage($this->fts . TF::GREEN . " You have set your gamemode to creative mode!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "gma") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("gma.use")) {
                    $sender->setGamemode(2);
                    $sender->sendMessage($this->fts . TF::GREEN . " You have set your gamemode to creative mode!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "gmspc") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("gmspc.use")) {
                    $sender->setGamemode(3);
                    $sender->sendMessage($this->fts . TF::GREEN . " You have set your gamemode to spectator mode!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "day") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("day.use")) {
                    $sender->getLevel()->setTime(6000);
                    $sender->sendMessage($this->fts . TF::GREEN . " You have set the time to day!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "cclear"){
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("ccclear.use")) {
                        foreach ($this->getServer()->getOnlinePlayers() as $player) {
                $player->sendMessage("n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nn\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n $this->fts . TF::GREEN . Chat cleared");
                        }
                        } else {
                        $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                    }
                }
                return true;
        }

        if ($cmd->getName() == "night") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("night.use")) {
                    $sender->getLevel()->setTime(16000);
                    $sender->sendMessage($this->fts . TF::GREEN . " You have set the time to night!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "You are not allowed to use this command");
                }
            }
            return true;
        }

        if ($cmd->getName() == "nv") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("nv.use")) {
                    if ($sender->hasEffect(Effect::NIGHT_VISION)) {
                        $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), (99999999 * 20), (1), (false)));
                        $sender->sendMessage($this->fts . TF::GREEN . " Night vision activated");
                    } else {
                        $sender->removeEffect(Effect::NIGHT_VISION);
                        $sender->sendMessage($this->fts . TF::RED . " Night vision deactivated");
                    }
                }
            }
            return true;
        }
        if ($cmd->getName() == "vanish") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("vanish.use")) {
                    if (!empty($args[0])) {
                        $sender->sendMessage($this->fts . TF::RED . " Syntax /vanish <on/off>");
                    }
                    if ($args[0] == "on"){
                        $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), (99999999 * 20), (1), (false)));
                        $sender->sendMessage($this->fts . TF::GREEN . " Vanish activated");
                        return true;
                    }
                    if ($args[0] == "off") {
                        if ($sender->hasEffect(Effect::INVISIBILITY)) {
                            $sender->removeEffect(Effect::INVISIBILITY);
                            $sender->sendMessage($this->fts . TF::RED . " Vanish deactivated");
                        }

                    }
                } else {
                    $sender->sendMessage($this->fts . TF::RED . " You are not allowed to use this command");

                    return true;
                }
            }
        }

        if ($cmd->getName() == "fly") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("fly.use")) {
                    if (!empty($args[0])) {
                        $sender->sendMessage($this->fts . TF::RED . "Syntax fly <on/off>");
                        if ($args[0] == "on") {
                            $sender->setAllowFlight(true);
                            $sender->sendMessage($this->fts . TF::GREEN . " Flymode activated");
                        }
                        if ($args[0] == "off") {
                            $sender->setAllowFlight(false);
                            $sender->sendMessage($this->fts . TF::RED . " Flymode deactivated");
                        }
                    }
                } else {
                    $sender->sendMessage($this->fts . TF::RED . " You are not allowed to use this command");
                    return true;
                }
            }
        }
    }
}
