<?php
namespace FruitCollector;

require_once 'Orchard.php';
require_once 'Fruit.php';
require_once 'Apple.php';
require_once 'Pear.php';

class Collector
{
    private array $fruits = [];
    private Orchard $orchard;

    public function __construct(Orchard $orchard)
    {
        $this->orchard = $orchard;
    }

    public function collect(): void
    {
        foreach ($this->orchard->getTrees() as $tree) {
            $fruitsFromTree = $tree->harvest();
            foreach ($fruitsFromTree as $fruit) {
                $this->addFruit($fruit);
            }
        }
    }

    public function addFruit(Fruit $fruit): void
    {
        $this->fruits[] = $fruit;
    }

    public function getTotalCountByType(string $type): int
    {
        $count = 0;
        foreach ($this->fruits as $fruit) {
            if (($type === 'apple' && $fruit instanceof Apple) ||
                ($type === 'pear' && $fruit instanceof Pear)) {
                $count++;
            }
        }
        return $count;
    }

    public function getTotalWeightByType(string $type): float
    {
        $totalWeight = 0;
        foreach ($this->fruits as $fruit) {
            if (($type === 'apple' && $fruit instanceof Apple) ||
                ($type === 'pear' && $fruit instanceof Pear)) {
                $totalWeight += $fruit->getWeight();
            }
        }
        return $totalWeight;
    }

    public function getHeaviestApple(): ?Apple
    {
        $heaviestApple = null;
        foreach ($this->fruits as $fruit) {
            if ($fruit instanceof Apple) {
                if ($heaviestApple === null || $fruit->getWeight() > $heaviestApple->getWeight()) {
                    $heaviestApple = $fruit;
                }
            }
        }
        return $heaviestApple;
    }
}
