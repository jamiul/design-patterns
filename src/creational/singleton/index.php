<?php
// index.php - Main entry point
namespace com\example;

require_once 'Logger.php';
require_once 'Dog.php';
require_once 'Cat.php';

$dog = new Dog();
$dog->woof() . PHP_EOL;
$cat = new Cat();
$cat->meow();
?>