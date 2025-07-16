<?php

namespace Structural\Bridge\Implementors;

use Structural\Bridge\Interfaces\MessagingServiceImplementor;

// Concrete Implementor A: Email Service
class EmailService implements MessagingServiceImplementor
{
    public function sendMessge(string $body): void
    {
        echo "Sending via Email: '{$body}'\n";
    }
}
