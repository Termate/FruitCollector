<?php
namespace FruitCollector;

require_once 'Tree.php';
require_once 'Apple.php';

class AppleTree extends Tree
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        $this->type = 'apple';
    }

    public function harvest(): array
    {
        $count = rand(40, 50);
        $harvestedFruits = [];
        for ($i = 0; $i < $count; $i++) {
            $weight = rand(150, 180);
            $harvestedFruits[] = new Apple($this->id, $weight);
        }
        return $harvestedFruits;
    }
}
