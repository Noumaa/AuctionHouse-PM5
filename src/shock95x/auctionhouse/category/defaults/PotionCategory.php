<?php
declare(strict_types=1);

namespace shock95x\auctionhouse\category\defaults;

use pocketmine\data\bedrock\PotionTypeIdMap;
use pocketmine\data\bedrock\PotionTypeIds;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\item\Item;
use pocketmine\item\Potion;
use pocketmine\item\SplashPotion;
use pocketmine\item\VanillaItems;
use pocketmine\utils\TextFormat;
use shock95x\auctionhouse\AHListing;
use shock95x\auctionhouse\category\ICategory;

class PotionCategory implements ICategory {

	public function sort(AHListing $listing): bool {
		return $listing->getItem() instanceof Potion || $listing->getItem() instanceof SplashPotion;
	}

	public function getName(): string {
		return "Potions";
	}

	public function getDisplayName(): string {
		return TextFormat::BOLD . TextFormat::LIGHT_PURPLE . $this->getName();
	}

	public function getMenuItem(): Item {
		return VanillaItems::POTION()
            ->setType(PotionTypeIdMap::getInstance()->fromId(PotionTypeIds::WATER))
            ->setCustomName(TextFormat::RESET . $this->getDisplayName());
	}
}