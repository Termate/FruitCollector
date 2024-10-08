<?php
namespace FruitCollector;

abstract class Tree
{
    protected int $id;
    protected string $type;
    protected array $fruits = [];

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    abstract public function harvest(): array;

    public function getType(): string
    {
        return $this->type;
    }
}
