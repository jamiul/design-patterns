<?php

namespace Creational\AbstractFactory;

use Creational\AbstractFactory\Interfaces\Chair;
use Creational\AbstractFactory\Interfaces\CoffeeTable;
use Creational\AbstractFactory\Interfaces\Sofa;
use Creational\AbstractFactory\Products\VintageChair;
use Creational\AbstractFactory\Products\VintageCoffeeTable;
use Creational\AbstractFactory\Products\VintageSofa;

class VintageFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new VintageChair();
    }

    public function createCoffeeTable(): CoffeeTable
    {
        return new VintageCoffeeTable();
    }

    public function createSofa(): Sofa
    {
        return new VintageSofa();
    }
}
