<?php
namespace FruitCollector;

require_once 'Fruit.php';

class Pear extends Fruit
{
    public function getType(): string
    {
        return 'pear';
    }
}
