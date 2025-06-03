<?php
namespace creational\prototype;

// Optional: Define a prototype interface
interface Prototypable {
    public function __clone(); // PHP 8.x allows return type 'self' for __clone
}
