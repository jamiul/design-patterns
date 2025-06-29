<?php

namespace Creational\AbstractFactory;

use Creational\AbstractFactory\Interfaces\Chair;
use Creational\AbstractFactory\Interfaces\CoffeeTable;
use Creational\AbstractFactory\Interfaces\Sofa;
use Creational\AbstractFactory\Products\ModernChair;
use Creational\AbstractFactory\Products\ModernCoffeeTable;
use Creational\AbstractFactory\Products\ModernSofa;

class ModernFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new ModernChair();
    }

    public function createCoffeeTable(): CoffeeTable
    {
        return new ModernCoffeeTable();
    }

    public function createSofa(): Sofa
    {
        return new ModernSofa();
    }
}
