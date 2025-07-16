<?php

namespace Structural\Bridge\Interfaces;

// Implementor: Defines the interface for all implementation classes.
interface MessagingServiceImplementor
{
    public function sendMessge(string $body): void;
}
