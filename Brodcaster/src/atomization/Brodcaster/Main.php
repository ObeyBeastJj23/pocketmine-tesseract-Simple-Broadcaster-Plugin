<?php


namespace atomization\Brodcaster;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;


class Main extends PluginBase implements Listener {
    
    public function onLoad(){
        $this->getLogger()->info("§l§a[§7Loading Brodcaster by AtomizationYT§a]§r");

    }
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info("§l§a[§7Brodcaster Enabled§a]§r");
    }
    
    public function onDisable(){
        $this->getLogger()->info("§l§a[§7Brodaster Disabled§a]§r");
    }
          
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer(); 
        $name = $player->getName();
        $this->getServer()->broadcastMessage(TextFormat::YELLOW."$name joined server."); 
        $player->sendMessage(TextFormat::GREEN."Welcome to server, please read rules.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array   $args){
        
        switch($command->getName()){ 

            case "brodcast":
                $sender->getServer()->broadcastMessage(TextFormat::WHITE."".implode(" ", $args));
            return true;
        }
    }
    
}