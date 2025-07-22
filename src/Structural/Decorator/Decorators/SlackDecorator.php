<?php

namespace Structural\Decorator\Decorators;

class SlackDecorator extends NotifierDecorator {
    public function send(string $message): string {
        $baseNotification = parent::send($message);
        return $baseNotification . " | Slack message sent: $message";
    }
}
