<?php
namespace FruitCollector;

require_once 'Fruit.php';

class Apple extends Fruit
{
    public function getType(): string
    {
        return 'apple';
    }
}
