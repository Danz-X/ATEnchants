<?php

namespace xPrim69x\ATEnchants\enchants\sword;

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Entity;
use pocketmine\entity\Living;
use pocketmine\item\enchantment\MeleeWeaponEnchantment;
use pocketmine\Player;

class PoisonEnchant extends MeleeWeaponEnchantment {

	public function isApplicableTo(Entity $victim) : bool{
		return $victim instanceof Living;
	}

	public function getDamageBonus(int $enchantmentLevel) : float{
		return 0;
	}

	public function onPostAttack(Entity $d, Entity $player, int $enchantmentLevel) : void{
		if ($player instanceof Player && $d instanceof Player) {
			if (mt_rand(1, 40) <= $enchantmentLevel) {
				$player->addEffect(new EffectInstance(Effect::getEffect(19), $enchantmentLevel * 120, 0));
			}
		}
	}
}