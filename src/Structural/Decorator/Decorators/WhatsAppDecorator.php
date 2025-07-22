<?php

namespace Structural\Decorator\Decorators;

class WhatsAppDecorator extends NotifierDecorator {
    public function send(string $message): string {
        $baseNotification = parent::send($message);
        return $baseNotification . " | WhatsApp message sent: $message";
    }
}
