<?php

namespace Creational\FactoryMethod;

class PdfDocument implements Document
{
    public function generate(): string
    {
        return 'PDF document generated';
    }
}