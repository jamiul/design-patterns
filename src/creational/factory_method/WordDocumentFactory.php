<?php

namespace Creational\FactoryMethod;

class WordDocumentFactory extends DocumentFactory
{
    public function createDocument(): Document
    {
        return new WordDocument();
    }
}