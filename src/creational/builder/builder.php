<?php

//Step 2: Define the Builder Interface
interface CarBuilder
{
    public function setEngine(string $engine): self;
    public function setWheels(int $wheels): self;
    public function setColor(string $color): self;
    public function build(): Car;
}
// Step 1: Define the Product (Car)
class Car
{
    public string $engine;
    public int $wheels;
    public string $color;

    public function __toString(): string
    {
        return sprintf(
            "Car with %s engine, %d wheels, and %s color.",
            $this->engine,
            $this->wheels,
            $this->color
        );
    }
}

//Step 3: Implement the Concrete Builder
class ConcreteCarBuilder implements CarBuilder
{
    private Car $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function setEngine(string $engine): self
    {
        $this->car->engine = $engine;
        return $this;
    }

    public function setWheels(int $wheels): self
    {
        $this->car->wheels = $wheels;
        return $this;
    }

    public function setColor(string $color): self
    {
        $this->car->color = $color;
        return $this;
    }

    public function build(): Car
    {
        return $this->car;
    }
}
//Step 4: Define the Director
class CarDirector
{
    public function buildSportsCar(CarBuilder $builder): Car
    {
        return $builder
            ->setEngine('V8')
            ->setWheels(4)
            ->setColor('Red')
            ->build();
    }

    public function buildSUV(CarBuilder $builder): Car
    {
        return $builder
            ->setEngine('V6')
            ->setWheels(4)
            ->setColor('Black')
            ->build();
    }
}

//Step 5: Use the Builder Pattern
$builder = new ConcreteCarBuilder();
$director = new CarDirector();

// Build a sports car
$sportsCar = $director->buildSportsCar($builder);
echo $sportsCar . PHP_EOL;

// Build an SUV
$suv = $director->buildSUV($builder);
echo $suv . PHP_EOL;