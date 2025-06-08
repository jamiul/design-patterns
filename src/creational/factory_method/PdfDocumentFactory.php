<?php

namespace Creational\FactoryMethod;

class PdfDocumentFactory extends DocumentFactory
{
    public function createDocument(): Document
    {
        return new PdfDocument();
    }
}