<?php

namespace Creational\AbstractFactory\Products;

use Creational\AbstractFactory\Interfaces\Chair;

class VintageChair implements Chair
{
    public function sitOn(): string
    {
        return "Sitting on a vintage chair.";
    }
}