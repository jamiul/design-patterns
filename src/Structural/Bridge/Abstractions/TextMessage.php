<?php

namespace Structural\Bridge\Abstractions;

use Structural\Bridge\Interfaces\MessagingServiceImplementor;

// Refined Abstraction A: A simple text message
class TextMessage extends Message
{
    private string $content;

    public function __construct(string $content, MessagingServiceImplementor $messagingService)
    {
        parent::__construct($messagingService);
        $this->content = $content;
    }

    public function send(): void
    {
        $this->messagingService->sendMessge($this->content);
    }
}
