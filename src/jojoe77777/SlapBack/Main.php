<?php

namespace jojoe77777\SlapBack;

use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\AnimatePacket;
use pocketmine\plugin\PluginBase;
use slapper\entities\SlapperHuman;
use slapper\events\SlapperHitEvent;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onSlapperHit(SlapperHitEvent $ev){
    	$entity = $ev->getEntity();
    	if(!$entity instanceof SlapperHuman){
    	    return;
	}
    	$pk = new AnimatePacket();
    	$pk->entityRuntimeId = $entity->getId();
    	$pk->action = 1;
    	$ev->getDamager()->dataPacket($pk);
    }

}
