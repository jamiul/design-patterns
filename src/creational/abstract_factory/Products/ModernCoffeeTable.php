<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\CoffeeTable;

class ModernCoffeeTable implements CoffeeTable
{
    public function placeItems(): string
    {
        return "Placing items on a modern coffee table.";
    }
}