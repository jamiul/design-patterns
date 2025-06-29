<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\CoffeeTable;

class VintageCoffeeTable implements CoffeeTable
{
    public function placeItems(): string
    {
        return "Placing items on a vintage coffee table.";
    }
}