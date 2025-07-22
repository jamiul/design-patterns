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
