<?php

namespace ShadowMikado\ChooseSize\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use ShadowMikado\ChooseSize\Main;

class ChooseSize extends Command
{

    public function __construct()
    {
        parent::__construct("size", "", "/size <int>");
        $this->setPermission("choosesize.cmd");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $cfg = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if ($sender->hasPermission("choosesize.cmd"))
            {
                if (isset($args[0])) {
                    if((int)$args[0] ) {

                        $replaced = str_replace("{size}", (int)$args[0], $cfg->get("Change Size Message"));
                        $sender->setScale((int)$args[0]);
                        $sender->sendMessage($replaced);

                    } else {
                        $sender->sendMessage($cfg->get("Error Message"));
                    }
                } else {
                    $sender->sendMessage($cfg->get("Error Message"));
                }

            } else {
                $sender->sendMessage($cfg->get("No Permission Message"));
            }
        }
    }
}