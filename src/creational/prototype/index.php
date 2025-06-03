<?php
namespace creational\prototype;

use DateTimeImmutable;

require_once __DIR__ . '/Prototypable.php';
require_once __DIR__ . '/BlogPost.php';
require_once __DIR__ . '/Author.php';

// --- Client Code ---

echo "--- Creating initial prototype post ---\n";
$originalAuthor = new Author("John Doe");
$prototypePost = new BlogPost("Prototype Post Title", "This is the original content.", $originalAuthor);
$prototypePost->addTag("php");
$prototypePost->addTag("design-patterns");
$prototypePost->display();

echo "\n--- Cloning the prototype to create a new post ---\n";
$newPost = clone $prototypePost; // This will invoke BlogPost::__clone()
$newPost->setTitle("A Cloned Adventure");
$newPost->setContent("Content for the cloned post.");
$newPost->addTag("clone");

// If we want the cloned post to have a different author instance
// (or modify the author without affecting the original prototype's author)
// $newPost->setAuthor(new Author("Jane Smith")); // Option 1: New author
// Or if you wanted to clone and modify the author from the prototype:
if ($newPost->getAuthor()) {
    $clonedAuthor = clone $newPost->getAuthor(); // Clone the author if already cloned by BlogPost::__clone
    $clonedAuthor->setName("Jane Smith (cloned)");
    $newPost->setAuthor($clonedAuthor);
}


echo "\n--- Displaying original post (should be unchanged for deep copy) ---\n";
$prototypePost->display();

echo "\n--- Displaying new cloned post ---\n";
$newPost->display();

echo "\n--- Demonstrating shallow vs. deep copy effect ---\n";
// If BlogPost::__clone didn't deep clone $author:
// $prototypePost->getAuthor()?->setName("Original Author Changed"); // This would also change $newPost's author name

// With deep cloning of Author in BlogPost::__clone:
$prototypePost->getAuthor()?->setName("John Doe V2");

echo "\n--- Displaying original post after modifying its author ---\n";
$prototypePost->display();

echo "\n--- Displaying new cloned post (author should be Jane Smith (cloned)) ---\n";
$newPost->display();

?>
