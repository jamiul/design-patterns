# Bridge Design Pattern in PHP

This repository provides a practical example of the **Bridge design pattern** in PHP. The core idea behind this pattern is to decouple an abstraction from its implementation, allowing both to evolve independently without affecting each other.

## What is the Bridge Pattern?

The Bridge is a structural design pattern that divides a large class or a group of tightly coupled classes into two distinct hierarchies: **Abstraction** and **Implementation**.

Consider a remote control (Abstraction) and a television (Implementation). You can have various types of remotes (simple, smart) and different types of TVs (LED, OLED). The remote controls the TV, but neither needs to know the internal workings of the other. The "bridge" facilitates this connection, enabling the remote to send commands (e.g., `on()`, `off()`, `changeChannel()`) to any compatible TV.

This pattern effectively addresses the "class explosion" problem. Instead of creating a class for every combination (e.g., `SimpleRemoteForLedTv`, `SmartRemoteForOledTv`), the Bridge pattern allows you to combine `N` abstractions with `M` implementations, resulting in `N + M` classes instead of `N * M`.

## Example: A Messaging System ✉️

Our example illustrates a messaging system capable of sending different message types through various communication channels.

*   **Abstraction Hierarchy**: Represents the type of message (e.g., `TextMessage`, `HtmlMessage`).
*   **Implementation Hierarchy**: Represents the channel used for sending messages (e.g., `EmailService`, `SmsService`).

### Core Components

1.  **Implementor (`MessagingServiceImplementor.php`)**:
    *   An interface defining the contract for the implementation side. It declares the `sendMessage()` method.
    *   **Concrete Implementors (`EmailService.php`, `SmsService.php`)**: Classes that provide the actual message sending logic for specific channels by implementing `MessagingServiceImplementor`.

2.  **Abstraction (`Message.php`)**:
    *   The high-level control layer that holds a reference to an `Implementor` object and defines the abstract `send()` method. It delegates the actual sending task to its associated implementor.
    *   **Refined Abstractions (`TextMessage.php`, `HtmlMessage.php`)**: These extend the `Message` abstraction, preparing specific message content and then invoking the `sendMessage()` method on the linked implementor.

### File Structure

```
.
├── MessagingServiceImplementor.php  # Implementor Interface
├── EmailService.php                 # Concrete Implementor A (Email)
├── SmsService.php                   # Concrete Implementor B (SMS)
|
├── Message.php                      # Abstraction Base Class
├── TextMessage.php                  # Refined Abstraction A (Plain Text)
├── HtmlMessage.php                  # Refined Abstraction B (HTML)
|
└── index.php                        # Client code to demonstrate usage
```

## How to Run the Example

1.  Ensure you have PHP installed on your system.
2.  Place all the example code into their respective files within the `src/Structure/Bridge/` directory.
3.  Execute the client code from your terminal:

    ```bash
    php src/Structure/Bridge/index.php
    ```

### Expected Output

```
Sending via Email: 'Hello, this is a plain text email!'
--------------------------------
Sending via SMS: 'Hello, this is a plain text SMS!'
--------------------------------
Sending via Email: 'Important NoticeYour account will expire soon.'
--------------------------------
Sending via SMS: 'Important NoticeYour account will expire soon.'
```

The output clearly demonstrates the pattern's flexibility, allowing any message type (`TextMessage`, `HtmlMessage`) to be combined with any delivery service (`EmailService`, `SmsService`) interchangeably.

## Key Benefits

*   **Decoupling**: Abstraction and Implementation can be developed and modified independently.
*   **Flexibility & Extensibility**: New message types or sending services can be added easily without altering existing code, adhering to the Open/Closed Principle.
*   **Improved Readability**: The pattern organizes code into clear, independent hierarchies, enhancing maintainability and understanding.
