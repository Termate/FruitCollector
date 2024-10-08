<?php
namespace FruitCollector;

require_once 'Tree.php';
require_once 'Pear.php';

class PearTree extends Tree
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        $this->type = 'pear';
    }

    public function harvest(): array
    {
        $count = rand(0, 20);
        $harvestedFruits = [];
        for ($i = 0; $i < $count; $i++) {
            $weight = rand(130, 170);
            $harvestedFruits[] = new Pear($this->id, $weight);
        }
        return $harvestedFruits;
    }
}
