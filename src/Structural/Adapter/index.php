<?php

require_once __DIR__ . '/PaymentProcessor.php';
require_once __DIR__ . '/Gateways/LegacyPayPalGateway.php';
require_once __DIR__ . '/Gateways/ModernStripeGateway.php';
require_once __DIR__ . '/Adapters/PayPalAdapter.php';
require_once __DIR__ . '/Adapters/StripeAdapter.php';

use App\Adapters\PayPalAdapter;
use App\Adapters\StripeAdapter;
use App\Gateways\LegacyPayPalGateway;
use App\Gateways\ModernStripeGateway;

// This is our CLIENT code.
// It depends only on the PaymentProcessor interface, not the concrete gateways.
class Checkout
{
    // The key is type-hinting the INTERFACE.
    public function process(PaymentProcessor $processor, float $orderTotal): void
    {
        echo "Starting checkout process for order total: $$orderTotal\n";
        $processor->pay($orderTotal);
        echo "Checkout process completed.\n\n";
    }
}

// --- Let's see it in action! ---

$checkout = new Checkout();
$orderAmount = 250.50;

// --- Use Case 1: Paying with PayPal ---
// 1. Create the Adaptee (the original, incompatible object)
$payPalGateway = new LegacyPayPalGateway();

// 2. Create the Adapter and give it the Adaptee
$payPalAdapter = new PayPalAdapter($payPalGateway, 'customer@example.com');

// 3. The Client uses the Adapter, thinking it's just a regular PaymentProcessor
$checkout->process($payPalAdapter, $orderAmount);


// --- Use Case 2: Paying with Stripe ---
// 1. Create the other Adaptee
$stripeGateway = new ModernStripeGateway();

// 2. Create its corresponding Adapter
$stripeAdapter = new StripeAdapter($stripeGateway);

// 3. The Client code doesn't change AT ALL. It happily accepts the new adapter.
$checkout->process($stripeAdapter, 99.99);
