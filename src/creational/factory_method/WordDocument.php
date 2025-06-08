<?php

namespace Creational\FactoryMethod;

class WordDocument implements Document
{
    public function generate(): string
    {
        return 'Word document generated';
    }
}