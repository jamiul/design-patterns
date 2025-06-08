# What is the Factory Method Design Pattern?
The Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created. In simpler terms, it's a way to delegate the instantiation logic to child classes.

Think of it like a restaurant. A head chef (the Creator) might have a method called createDish(). Now, different specialized chefs (the ConcreteCreator classes) can extend the head chef's capabilities. A PastryChef's createDish() method will return a Dessert, while a GrillChef's createDish() will return a Steak. The client code doesn't need to know the specifics of how each dish is made; it just calls the createDish() method on the appropriate chef.

This pattern promotes loose coupling by separating the client code from the concrete classes of the objects it needs to create. It also adheres to the Open/Closed Principle, meaning you can introduce new types of products without modifying the existing client code.



## Core Components
The Factory Method pattern has four main components:

#### Product: This is an interface or an abstract class that defines the type of object the factory method will create.
#### ConcreteProduct: These are the actual classes that implement the Product interface.
#### Creator: This is an abstract class or an interface that declares the factory method, which returns an object of the Product type. It can also contain other methods that operate on the products created by the factory method.
#### ConcreteCreator: These are the classes that implement the Creator's factory method to produce a specific ConcreteProduct.

### When to Use the Factory Method Pattern
- When a class can't anticipate the class of objects it must create.
- When a class wants its subclasses to specify the objects it creates.
- When you want to provide users of your library or framework with a way to extend its internal components.
This pattern is a powerful tool for creating flexible and extensible object-oriented systems.