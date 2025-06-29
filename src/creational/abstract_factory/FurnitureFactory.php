<?php

namespace Creational\AbstractFactory;

use Creational\AbstractFactory\Interfaces\Chair;
use Creational\AbstractFactory\Interfaces\CoffeeTable;
use Creational\AbstractFactory\Interfaces\Sofa;

interface FurnitureFactory
{
    public function createChair(): Chair;
    public function createCoffeeTable(): CoffeeTable;
    public function createSofa(): Sofa;
}
