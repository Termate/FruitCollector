<?php
namespace FruitCollector;

require_once 'AppleTree.php';
require_once 'PearTree.php';

class Orchard
{
    private array $trees = [];

    public function addTree(Tree $tree): void
    {
        $this->trees[] = $tree;
    }

    public function getTrees(): array
    {
        return $this->trees;
    }
}
