<?php
// Cat.php
namespace com\example;

class Cat
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = Logger::getInstance();
    }

    public function meow(): void
    {
        $this->logger->log("Meow");
    }
}
?>