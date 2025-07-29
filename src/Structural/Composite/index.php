<?php
// The component interface
namespace Structural\Composite;

interface Sellable
{
    public function getPrice(): float;

    public function getName(): string;

}

// The Leaf class

final readonly class Product implements Sellable
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

// The Composite class
class ProductBox implements Sellable
{
    private array $children = [];

    public function __construct(private string $name) {}

    public function add(Sellable $sellable): void
    {
        $this->children[] = $sellable;
    }

    public function remove(Sellable $sellable): void
    {
        $this->children = array_filter(
            $this->children,
            fn($child) => $child !== $sellable
        );
    }

    public function getPrice(): float
    {
        echo "Calculating price for [Box: {$this->name}]:\n";

        return array_reduce(
            $this->children,
            fn($carry, Sellable $child) => $carry + $child->getPrice(),
            0.0
        );
    }

    public function getName(): string
    {
        return $this->name;
    }
}

// Example usage
// 1. Create some leaf nodes (individual products)
$keyboard = new Product(name: 'Mechanical Keyboard', price: 99.99);
$mouse = new Product(name: 'Gaming Mouse', price: 49.50);
$headset = new Product(name: '7.1 Surround Headset', price: 120.00);
$mousepad = new Product(name: 'XXL Mousepad', price: 25.00);

// 2. Create a composite node (a box)
$gamerBundleBox = new ProductBox(name: 'The Pro-Gamer Bundle');

// 3. Add leaf nodes to the composite
$gamerBundleBox->add($keyboard);
$gamerBundleBox->add($mouse);
$gamerBundleBox->add($headset);

// 4. Create another, bigger composite
$shippingCrate = new ProductBox(name: 'Main Shipping Crate');

// 5. Add a leaf and a composite to the bigger composite
$shippingCrate->add($mousepad);       // Adding a leaf
$shippingCrate->add($gamerBundleBox); // Adding a composite

// 6. The "magic" moment: The client calls getPrice() on the top-level container
echo "========================================\n";
echo "Calculating Total Price...\n";
echo "========================================\n";

$totalPrice = $shippingCrate->getPrice();

echo "========================================\n";
echo "Total Crate Price: $" . number_format($totalPrice, 2) . "\n";
echo "========================================\n";

// --- Let's define a function to show the uniform treatment ---

function printComponentDetails(Sellable $component): void
{
    echo "\nComponent: '{$component->getName()}' | Total Price: {$component->getPrice()}\n";
}

// The client can pass ANY sellable item to this function
// printComponentDetails($keyboard);
printComponentDetails($gamerBundleBox);
printComponentDetails($shippingCrate);