<?php
// File: src/Adapters/StripeAdapter.php

declare(strict_types=1);

namespace App\Adapters;

use App\Gateways\ModernStripeGateway;
use PaymentProcessor;

// This is the ADAPTER for Stripe.
// It also implements our TARGET interface.
class StripeAdapter implements PaymentProcessor
{
    // Using constructor property promotion again.
    public function __construct(
        private readonly ModernStripeGateway $stripeGateway
    ) {}

    // The adapter's job can also include data transformation.
    // Here we convert the dollar amount to cents for the Stripe gateway.
    public function pay(float $amount): void
    {
        $amountInCents = (int) ($amount * 100);
        $this->stripeGateway->makeCharge($amountInCents);
    }
}
