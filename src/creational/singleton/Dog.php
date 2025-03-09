<?php
// Dog.php
namespace com\example;

class Dog
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = Logger::getInstance();
    }

    public function woof(): void
    {
        $this->logger->log("Woof");
    }
}
?>