<?php

namespace potions;

use pocketmine\player\Player;
use pocketmine\item\VanillaItems;
use pocketmine\item\SplashPotion;
use pocketmine\network\mcpe\protocol\types\InputMode;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;

class MainListener extends PluginBase implements Listener{

  public function onSplashPotion(PlayerInteractEvent $ev){
     /** @var CustomPlayer */
    $player = $ev->getPlayer();
     $item = $ev->getItem();
    if($item instanceof SplashPotion && $player->getCurrentInputMode() === InputMode::TOUCHSCREEN){
      $returnedItems = [];
      $item->onClickAir($player, $player->getDirectionVector(), $returnedItems);
      if(!$player->isCreative())$player->getInventory()->setItemInHand(VanillaItems::AIR());
    }
  }
}