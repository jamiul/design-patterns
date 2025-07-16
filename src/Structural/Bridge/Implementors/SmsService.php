<?php

namespace Structural\Bridge\Implementors;

use Structural\Bridge\Interfaces\MessagingServiceImplementor;

// Concrete Implementor B: SMS Service
class SmsService implements MessagingServiceImplementor
{
    public function sendMessge(string $body): void
    {
        echo "Sending via SMS: '{$body}'\n";
    }
}
