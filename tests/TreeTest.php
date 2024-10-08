<?php
use PHPUnit\Framework\TestCase;
use FruitCollector\AppleTree;
use FruitCollector\PearTree;

class TreeTest extends TestCase
{
    public function testAppleTreeHarvest()
    {
        $appleTree = new AppleTree(1);
        $fruits = $appleTree->harvest();

        $this->assertIsArray($fruits);
        $this->assertGreaterThanOrEqual(40, count($fruits));
        $this->assertLessThanOrEqual(50, count($fruits));
        $this->assertInstanceOf(\FruitCollector\Apple::class, $fruits[0]);
    }

    public function testPearTreeHarvest()
    {
        $pearTree = new PearTree(2);
        $fruits = $pearTree->harvest();

        $this->assertIsArray($fruits);
        $this->assertGreaterThanOrEqual(0, count($fruits));
        $this->assertLessThanOrEqual(20, count($fruits));
        $this->assertInstanceOf(\FruitCollector\Pear::class, $fruits[0]);
    }
}
