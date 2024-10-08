<?php

require_once 'src/Orchard.php';
require_once 'src/AppleTree.php';
require_once 'src/PearTree.php';
require_once 'src/Collector.php';

$orchard = new Orchard();

for ($i = 1; $i <= 10; $i++) {
    $orchard->addTree(new AppleTree($i));
}

for ($i = 1001; $i <= 1015; $i++) {
    $orchard->addTree(new PearTree($i));
}

$collector = new Collector($orchard);

$collector->collect();

echo "Общее количество собранных яблок: " . $collector->getTotalCountByType('apple') . PHP_EOL;
echo "Общее количество собранных груш: " . $collector->getTotalCountByType('pear') . PHP_EOL;

echo "Общий вес собранных яблок: " . $collector->getTotalWeightByType('apple') . " гр" . PHP_EOL;
echo "Общий вес собранных груш: " . $collector->getTotalWeightByType('pear') . " гр" . PHP_EOL;

$heaviestApple = $collector->getHeaviestApple();
if ($heaviestApple) {
    echo "Самое тяжелое яблоко весит: " . $heaviestApple->getWeight() . " гр и собрано с дерева ID " . $heaviestApple->getTreeId() . PHP_EOL;
} else {
    echo "Яблоки не были собраны." . PHP_EOL;
}
