<?php
// Logger.php
namespace com\example;

class Logger
{
    private static ?Logger $instance = null;

    private function __construct() {}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log(string $logMessage): void
    {
        echo $logMessage . PHP_EOL;
    }
}
?>