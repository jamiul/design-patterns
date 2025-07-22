<?php

namespace Structural\Decorator\Decorators;

class SMSDecorator extends NotifierDecorator {
    public function send(string $message): string {
        $baseNotification = parent::send($message);
        return $baseNotification . " | SMS sent: $message";
    }
}
