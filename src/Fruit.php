<?php
namespace FruitCollector;

abstract class Fruit
{
    private int $treeId;
    private float $weight;

    public function __construct(int $treeId, float $weight)
    {
        $this->treeId = $treeId;
        $this->weight = $weight;
    }

    public function getTreeId(): int
    {
        return $this->treeId;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    abstract public function getType(): string;
}
