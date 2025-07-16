<?php
// File: src/Gateways/ModernStripeGateway.php

declare(strict_types=1);

namespace App\Gateways;

// This is another ADAPTEE.
// Its interface is also incompatible.
// It requires the amount in cents, which is a common practice.
class ModernStripeGateway
{
    public function makeCharge(int $amountInCents): bool
    {
        echo "Charging $$" . ($amountInCents / 100) . " via Stripe...\n";
        // ... complex Stripe API logic here ...
        echo "Stripe charge successful.\n";
        return true;
    }
}
