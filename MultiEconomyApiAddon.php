<?php
declare(strict_types = 1);

/**
 * @name EconomyApiAddon
 * @version 1.0.0
 * @main JackMD\ScoreHud\Addons\MultiEconomyApiAddon
 * @depend MultiEconomy
 */
namespace JackMD\ScoreHud\Addons
{
	use JackMD\ScoreHud\addon\AddonBase;
	use twisted\multieconomy\MultiEconomy;
	use pocketmine\Player;

	class MultiEconomyApiAddon extends AddonBase{

		/** @var EconomyAPI */
		private $multieco;

		public function onEnable(): void{
			$this->multieco = $this->getServer()->getPluginManager()->getPlugin("MultiEconomy");
		}

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			return [
				"{coins}" => $this->multieco->getCurrency("Coins")->getBalance($player->getName())
			];
		}
	}
}
