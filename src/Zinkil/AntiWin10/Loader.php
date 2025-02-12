<?php

namespace Zinkil\AntiWin10;

use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;
use pocketmine\Player;
use pocketmine\Server;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function DataPacketReceive(DataPacketReceiveEvent $event){
        $player = $event->getPlayer();
        $packet = $event->getPacket();
        if ($packet instanceof LoginPacket){
            if ($packet->clientData["DeviceOS"] == 7){//7 is for Windows10
                $player->kick("§l§eYou are playing on Windows 10\n§r§cYou can't join this server with Win10", false);
            }
        }
    }
}