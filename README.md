# 𝗛𝗼𝘄 𝘁𝗼 𝘀𝗲𝗹𝗲𝗰𝘁 𝗗𝗲𝘀𝗶𝗴𝗻 𝗣𝗮𝘁𝘁𝗲𝗿𝗻?

Selecting the correct design pattern in software engineering is crucial for effective problem-solving. This guide streamlines the process, enabling you to make informed decisions between patterns based on your specific needs.

It provides concise descriptions and valuable use cases for each pattern, making it easier to understand and apply them in real-world scenarios.

To select a pattern, we must first go through the problem identification. If the problem is related to:

 🔸 Object creation? → Creational patterns</br>
 🔸 Object assembly? → Structural patterns</br>
 🔸 Object interactions? → Behavioral patterns

So, let's dive in.

## 𝟭. 𝗖𝗿𝗲𝗮𝘁𝗶𝗼𝗻𝗮𝗹 𝗣𝗮𝘁𝘁𝗲𝗿𝗻𝘀

 🔹 Singleton: Use when a single instance of a class is needed. Some examples are logging and database connections.</br>
 🔹 Factory Method: Decouple object creation from usage. For example, you create different types of database connections based on configuration.</br>
 🔹 Abstract Factory: Create families of related objects. For example, I build parsers for different file formats.</br>
 🔹 Builder: Constructing complex objects step by step. For example, if you need to create a complex domain object.</br>
 🔹 Prototype: Creating duplicate objects and reusing cached objects to reduce database calls.

## 𝟮. 𝗦𝘁𝗿𝘂𝗰𝘁𝘂𝗿𝗮𝗹 𝗣𝗮𝘁𝘁𝗲𝗿𝗻𝘀

 🔹 Adapter: Make incompatible interfaces compatible. For example, it integrates a new logging library into an existing system that expects a different interface.</br>
 🔹 Composite: Represent part-whole hierarchies. For example, graphic objects in a drawing application can be grouped and treated uniformly</br>
 🔹 Proxy: Control access to objects. For example, lazy loading of a high-resolution image in a web application.</br>
 🔹 Decorator: Dynamically add/remove behavior. For example, we are implementing compression or encryption on top of file streams.</br>
 🔹 Bridge: Decouple abstraction from implementation. For example, I am separating platform-specific code from core logic.</br>

## 𝟯. 𝗕𝗲𝗵𝗮𝘃𝗶𝗼𝗿𝗮𝗹 𝗣𝗮𝘁𝘁𝗲𝗿𝗻𝘀

 🔹 Strategy: Define a family of algorithms. These algorithms enable users to select from various sorting or compression algorithms.</br>
 🔹 Observer: Maintain a consistent state by being notified of changes and, for example, notifying subscribers of events in a messaging system.</br>
 🔹 Command: Encapsulate a request as an object. For example, I implement undo/redo functionality in a text or image editor.</br>
 🔹 State: Encapsulate state-specific behavior. For example, we are handling different states of a user interface element (e.g., enabled, disabled, selected).</br>
 🔹 Template Method: Define the skeleton of an algorithm in operation, deferring some steps to subclasses and implementing a base class for unit testing with customizable setup and teardown steps.</br>

Ultimately, we devised the pattern we needed for our problem.