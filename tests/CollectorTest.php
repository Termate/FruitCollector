<?php
use PHPUnit\Framework\TestCase;
use FruitCollector\Orchard;
use FruitCollector\AppleTree;
use FruitCollector\PearTree;
use FruitCollector\Collector;
use FruitCollector\Apple;
use FruitCollector\Pear;

class CollectorTest extends TestCase
{
    public function testCollect()
    {
        $orchard = new Orchard();

        $appleTree = $this->createMock(AppleTree::class);
        $appleFruit = new Apple(1, 160);
        $appleTree->method('harvest')->willReturn([$appleFruit]);

        $pearTree = $this->createMock(PearTree::class);
        $pearFruit = new Pear(1001, 140);
        $pearTree->method('harvest')->willReturn([$pearFruit]);

        $orchard->addTree($appleTree);
        $orchard->addTree($pearTree);

        $collector = new Collector($orchard);
        $collector->collect();

        $this->assertEquals(1, $collector->getTotalCountByType('apple'));
        $this->assertEquals(1, $collector->getTotalCountByType('pear'));
        $this->assertEquals(160, $collector->getTotalWeightByType('apple'));
        $this->assertEquals(140, $collector->getTotalWeightByType('pear'));

        $heaviestApple = $collector->getHeaviestApple();
        $this->assertInstanceOf(Apple::class, $heaviestApple);
        $this->assertEquals(160, $heaviestApple->getWeight());
        $this->assertEquals(1, $heaviestApple->getTreeId());
    }
}
