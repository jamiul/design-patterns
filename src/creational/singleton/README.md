# The Singleton Design Pattern
The Singleton design pattern is a creational pattern that ensures a class has only one instance while providing a global point of access to that instance.

## Purpose of the Singleton Pattern

The Singleton pattern is used when:

1. Exactly one instance of a class is needed throughout the application
2. That single instance needs to be accessible from multiple parts of the code
3. You want to control when and how that instance is created

### 1. Private Constructor
```bash
private function __construct() {}
```
This prevents external code from creating new instances using the new keyword. Only the class itself can create an instance.

### 2. Static Instance Holder
```bash
private static ?Logger $instance = null;
```
This static property holds the single instance of the class. It's initially null until the instance is created.

### 3. Global Access Point

```bash
public static function getInstance(): self
{
    if (self::$instance === null) {
        self::$instance = new self();
    }
    return self::$instance;
}
```
This method serves as the global access point to obtain the singleton instance. It creates the instance on first call (lazy initialization) and returns the existing instance on subsequent calls.

### How the Pattern Works in the Example

1. When Dog or Cat classes need logging functionality, they call Logger::getInstance()
2. On the first call, the Logger creates a new instance of itself
3. On all subsequent calls, it returns the previously created instance
4. This ensures all objects share the same Logger instance

#### For example, in the Dog class:
```bash
public function __construct()
{
    $this->logger = Logger::getInstance();
}
```

### Benefits Demonstrated in the Code

1. Resource Efficiency: Only one Logger object is created regardless of how many Dogs and Cats exist
2. Consistency: All logging operations use the same Logger instance
3. Global Access: Any class can access the Logger through the getInstance() method
4. Lazy Initialization: The Logger is only created when first needed

### Considerations
While effective for specific use cases like logging, configuration management, and database connections, singletons should be used judiciously as they introduce global state to an application and can make testing more challenging.