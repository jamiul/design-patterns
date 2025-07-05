<?php
// File: src/Adapters/PayPalAdapter.php

declare(strict_types=1);

namespace App\Adapters;

use App\Gateways\LegacyPayPalGateway;
use PaymentProcessor;

// This is the ADAPTER for PayPal.
// It implements our TARGET interface.
class PayPalAdapter implements PaymentProcessor
{
    // PHP 8.1+ Constructor Property Promotion and readonly properties.
    // The adapter holds a reference to the adaptee.
    public function __construct(
        private readonly LegacyPayPalGateway $payPalGateway,
        private readonly string $customerEmail
    ) {}

    // This method translates the call from our application's
    // standard 'pay' method to the specific method of the LegacyPayPalGateway.
    public function pay(float $amount): void
    {
        $this->payPalGateway->sendPaymentToEmail($this->customerEmail, $amount);
    }
}
