<?php


namespace ShadowMikado\ChooseSize;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use ShadowMikado\ChooseSize\Commands\ChooseSize;


class Main extends PluginBase implements Listener
{

    public Config $config;

    /**
     * @var Main
     */

    public static Main $main;

    public function onLoad(): void
    {
        $this->getServer()->getLogger()->info("Starting ChooseSize Plugin...");
        $this->saveResource("config.yml");
    }

    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("ChooseSize Plugin Started");
        $this->getServer()->getCommandMap()->registerAll("", [new ChooseSize()]);
        self::$main = $this;
    }

    public static function getInstance(): Main
    {
        return self::$main;
    }

    public function onDisable(): void
    {
        $this->getServer()->getLogger()->info("ChooseSize Plugin Stopped");
    }
}