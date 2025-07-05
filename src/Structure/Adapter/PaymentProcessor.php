<?php

declare(strict_types=1);

// This is the TARGET interface.
// Our application's client code will depend on this.
// It represents the ideal, simple way we want to process payments.
interface PaymentProcessor
{
    public function pay(float $amount): void;
}
