<?php

namespace Structural\Bridge\Abstractions;

use Structural\Bridge\Interfaces\MessagingServiceImplementor;

// Abstraction: The high-level control. It delegates the actual work to the implementor.
abstract class Message
{
    protected MessagingServiceImplementor $messagingService;

    public function __construct(MessagingServiceImplementor $messagingService)
    {
        $this->messagingService = $messagingService;
    }

    abstract public function send(): void;
}
