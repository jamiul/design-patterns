<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\Sofa;

class ModernSofa implements Sofa
{
    public function lieOn(): string
    {
        return "Lying on a modern sofa.";
    }
}