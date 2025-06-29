<?php

namespace Creational\AbstractFactory;

require_once __DIR__ . '/Interfaces/Chair.php';
require_once __DIR__ . '/Interfaces/CoffeeTable.php';
require_once __DIR__ . '/Interfaces/Sofa.php';
require_once __DIR__ . '/Products/ModernChair.php';
require_once __DIR__ . '/Products/ModernCoffeeTable.php';
require_once __DIR__ . '/Products/ModernSofa.php';
require_once __DIR__ . '/Products/VintageChair.php';
require_once __DIR__ . '/Products/VintageCoffeeTable.php';
require_once __DIR__ . '/Products/VintageSofa.php';
require_once __DIR__ . '/FurnitureFactory.php';
require_once __DIR__ . '/ModernFurnitureFactory.php';
require_once __DIR__ . '/VintageFurnitureFactory.php';


function createAndUseFurniture(FurnitureFactory $factory)
{
    $chair = $factory->createChair();
    $coffeeTable = $factory->createCoffeeTable();
    $sofa = $factory->createSofa();

    echo $chair->sitOn() . "\n";
    echo $coffeeTable->placeItems() . "\n";
    echo $sofa->lieOn() . "\n";
}

// Let's create a set of modern furniture
echo "--- Creating Modern Furniture ---\n";
createAndUseFurniture(new ModernFurnitureFactory());

echo "\n";

// Now, let's create a set of vintage furniture
echo "--- Creating Vintage Furniture ---\n";
createAndUseFurniture(new VintageFurnitureFactory());
