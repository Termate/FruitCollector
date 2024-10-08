<?php
use PHPUnit\Framework\TestCase;
use FruitCollector\Orchard;
use FruitCollector\AppleTree;
use FruitCollector\PearTree;

class OrchardTest extends TestCase
{
    public function testAddTree()
    {
        $orchard = new Orchard();
        $appleTree = new AppleTree(1);
        $pearTree = new PearTree(2);

        $orchard->addTree($appleTree);
        $orchard->addTree($pearTree);

        $trees = $orchard->getTrees();
        $this->assertCount(2, $trees);
        $this->assertInstanceOf(AppleTree::class, $trees[0]);
        $this->assertInstanceOf(PearTree::class, $trees[1]);
    }
}
