<?php

require_once __DIR__ . '/Interfaces/NotifierInterface.php';
require_once __DIR__ . '/Components/Notifier.php';
require_once __DIR__ . '/Decorators/NotifierDecorator.php';
require_once __DIR__ . '/Decorators/SMSDecorator.php';
require_once __DIR__ . '/Decorators/SlackDecorator.php';
require_once __DIR__ . '/Decorators/WhatsAppDecorator.php';

use Structural\Decorator\Components\Notifier;
use Structural\Decorator\Decorators\SlackDecorator;
use Structural\Decorator\Decorators\SMSDecorator;
use Structural\Decorator\Decorators\WhatsAppDecorator;

// Client code
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

// Decorate with all three
$allNotifier = new WhatsAppDecorator($combinedNotifier);
echo "-- All Notifiers --\n";
echo $allNotifier->send("Your package is arriving soon!") . "\n";
echo "\n\n";
