<?php
namespace creational\prototype;

class Author {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
        echo "Creating new Author: {$this->name}\n";
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    // If Author had its own complex state or object properties,
    // it might also need a __clone method for deep copying.
    public function __clone() {
        echo "Cloning Author: {$this->name}\n";
    }
}
