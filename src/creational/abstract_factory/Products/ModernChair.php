<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\Chair;

class ModernChair implements Chair
{
    public function sitOn(): string
    {
        return "Sitting on a modern chair.";
    }
}