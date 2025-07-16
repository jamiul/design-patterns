<?php

namespace Structural\Bridge\Abstractions;

use Structural\Bridge\Interfaces\MessagingServiceImplementor;

// Refined Abstraction B: An HTML message
class HtmlMessage extends Message
{
    private string $htmlBody;

    public function __construct(string $htmlBody, MessagingServiceImplementor $messagingService)
    {
        parent::__construct($messagingService);
        $this->htmlBody = $htmlBody;
    }

    public function send(): void
    {
        $formattedBody = strip_tags($this->htmlBody);
        $this->messagingService->sendMessge($formattedBody);
    }
}
