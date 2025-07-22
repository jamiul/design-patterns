<?php

namespace Structural\Decorator\Components;

use Structural\Decorator\Interfaces\NotifierInterface;

class Notifier implements NotifierInterface {
    public function send(string $message): string {
        return "Email sent: $message";
    }
}
