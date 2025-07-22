# Decorator Design Pattern

The Decorator design pattern lets you dynamically add new behaviors or responsibilities to an object without altering its original code. It's a structural pattern that acts as a wrapper around an existing class.

Think of it like adding toppings to a pizza. You start with a base pizza (the object), and then you "decorate" it with cheese, pepperoni, or mushrooms (the new functionalities). Each topping adds to the final product without changing the base pizza itself.

## Key Players

-   **Component Interface**: Defines the core functionality.
-   **Concrete Component**: The base implementation of the component interface.
-   **Decorator**: Implements the component interface and wraps a component object.
-   **Concrete Decorators**: Add specific behaviors by extending the decorator.

## Key Benefits

-   **Open/Closed Principle**: You can add new functionalities (decorators) without modifying existing code (the concrete component).
-   **Flexibility**: You can combine functionalities in various ways at runtime.
-   **Single Responsibility**: It avoids bloating a single class with many optional features. Each decorator class has one specific responsibility.

## Example

Here's an example of the Decorator pattern in PHP:

```php
<?php

// 1. Component interface
interface NotifierInterface {
    public function send(string $message): string;
}

// 2. Concrete component
class Notifier implements NotifierInterface {
    public function send(string $message): string {
        return "Email sent: $message";
    }
}

// 3. The Abstract Decorator
abstract class NotifierDecorator implements NotifierInterface {
    protected NotifierInterface $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function send(string $message): string {
        return $this->notifier->send($message);
    }
}

// 4. Concrete Decorator A
class SMSDecorator extends NotifierDecorator {
    public function send(string $message): string {
        $baseNotification = parent::send($message);
        return $baseNotification . " | SMS sent: $message";
    }
}

// 5. Concrete Decorator B
class SlackDecorator extends NotifierDecorator {
    public function send(string $message): string {
        $baseNotification = parent::send($message);
        return $baseNotification . " | Slack message sent: $message";
    }
}

// 6. Client code
// Create the base notifier
$notifier = new Notifier();
echo "-- Basic Notification --\n";
echo $notifier->send("Your order has been shipped!") . "\n";
echo "\n\n";

// Decorate with SMS
$smsNotifier = new SMSDecorator($notifier);
echo "-- SMS Notification --\n";
echo $smsNotifier->send("Your order is out for delivery!") . "\n";
echo "\n\n";

// Decorate with Slack
$slackNotifier = new SlackDecorator($notifier);
echo "-- Slack Notification --\n";
echo $slackNotifier->send("Your order has been delivered!") . "\n";
echo "\n\n";

// Decorate with both SMS and Slack
$combinedNotifier = new SlackDecorator($smsNotifier);
echo "-- Combined SMS and Slack Notification --\n";
echo $combinedNotifier->send("Your order is ready for pickup!") . "\n";
echo "\n\n";
```

### Output

```
-- Basic Notification --
Email sent: Your order has been shipped!


-- SMS Notification --
Email sent: Your order is out for delivery! | SMS sent: Your order is out for delivery!


-- Slack Notification --
Email sent: Your order has been delivered! | Slack message sent: Your order has been delivered!


-- Combined SMS and Slack Notification --
Email sent: Your order is out for delivery! | SMS sent: Your order is out for delivery! | Slack message sent: Your order is ready for pickup!
