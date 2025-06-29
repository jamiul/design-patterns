<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\Sofa;

class VintageSofa implements Sofa
{
    public function lieOn(): string
    {
        return "Lying on a vintage sofa.";
    }
}