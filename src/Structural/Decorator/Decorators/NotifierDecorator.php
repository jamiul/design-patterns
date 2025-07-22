<?php

namespace Structural\Decorator\Decorators;

use Structural\Decorator\Interfaces\NotifierInterface;

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
