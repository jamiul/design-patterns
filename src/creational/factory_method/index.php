<?php

namespace Creational\FactoryMethod;

require_once __DIR__ . '/Document.php';
require_once __DIR__ . '/DocumentFactory.php';
require_once __DIR__ . '/WordDocument.php';
require_once __DIR__ . '/PdfDocument.php';
require_once __DIR__ . '/WordDocumentFactory.php';
require_once __DIR__ . '/PdfDocumentFactory.php';

function clientCode(DocumentFactory $factory)
{
    echo "Client: I'm not aware of the creator's class, but it still works.\n";
    echo $factory->processDocument() . "\n\n";
}

echo "App: Launched with the WordDocumentFactory.\n";
clientCode(new WordDocumentFactory());

echo "App: Launched with the PdfDocumentFactory.\n";
clientCode(new PdfDocumentFactory());