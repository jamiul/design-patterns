<?php
namespace creational\prototype;

use DateTimeImmutable;

class BlogPost implements Prototypable {
    private string $title;
    private string $content;
    private DateTimeImmutable $createdAt;
    private array $tags = [];
    private ?Author $author = null; // Example of an object property

    public function __construct(string $title, string $content, ?Author $author = null) {
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = new DateTimeImmutable();
        $this->author = $author;
        echo "Creating new blog post: '{$this->title}' (Expensive operation simulated)\n";
        // Simulate some expensive initialization
        sleep(1);
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function addTag(string $tag): void {
        $this->tags[] = $tag;
    }

    public function getTags(): array {
        return $this->tags;
    }

    public function getCreatedAt(): DateTimeImmutable {
        return $this->createdAt;
    }

    public function setAuthor(?Author $author): void {
        $this->author = $author;
    }

    public function getAuthor(): ?Author {
        return $this->author;
    }

    /**
     * The __clone method is called when an object is cloned.
     * PHP performs a shallow copy of properties by default.
     * For deep copying of objects within this object (like $author or $createdAt if it were mutable),
     * you need to explicitly clone them here.
     */
    public function __clone() {
        echo "Cloning blog post: '{$this->title}'\n";
        // For deep cloning of object properties:
        // If $this->author was mutable and you wanted a separate copy for the clone:
        if ($this->author !== null) {
            $this->author = clone $this->author;
        }

        // DateTimeImmutable is immutable, so a shallow copy is fine.
        // If it were DateTime (mutable), you might want:
        // $this->createdAt = clone $this->createdAt;

        // For arrays of objects, you might need to iterate and clone each object.
        // For simple scalar arrays like $tags, a shallow copy is usually sufficient.
        // If $tags contained objects that needed deep cloning:
        // $clonedTags = [];
        // foreach ($this->tags as $tagObject) {
        //     $clonedTags[] = clone $tagObject;
        // }
        // $this->tags = $clonedTags;

        // PHP 8.4 doesn't introduce specific new syntax for cloning itself,
        // but good type hinting and modern practices are encouraged.
        return $this;
    }

    public function display(): void {
        echo "-------------------------\n";
        echo "Title: {$this->title}\n";
        echo "Content: {$this->content}\n";
        echo "Created At: {$this->createdAt->format('Y-m-d H:i:s')}\n";
        echo "Tags: " . implode(', ', $this->tags) . "\n";
        if ($this->author) {
            echo "Author: {$this->author->getName()}\n";
        }
        echo "-------------------------\n";
    }
}
