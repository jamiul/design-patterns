<?php
// File: src/Gateways/LegacyPayPalGateway.php

declare(strict_types=1);

namespace App\Gateways;

// This is an ADAPTEE.
// Notice its interface is incompatible with our PaymentProcessor interface.
// It has a different method name and requires an email.
class LegacyPayPalGateway
{
    public function sendPaymentToEmail(string $email, float $value): void
    {
        echo "Processing PayPal payment of $$value to $email...\n";
        // ... complex PayPal API logic here ...
        echo "PayPal payment successful.\n";
    }
}
