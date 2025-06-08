<?php

namespace Creational\FactoryMethod;

abstract class DocumentFactory
{
    abstract public function createDocument(): Document;

    public function processDocument(): string
    {
        // Call the factory method to get a Document object.
        $document = $this->createDocument();

        // Now, work with the document.
        $result = "Factory: Processing the document.\n";
        $result .= $document->generate();

        return $result;
    }
}
