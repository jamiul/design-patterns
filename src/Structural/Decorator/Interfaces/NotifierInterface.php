<?php

namespace Structural\Decorator\Interfaces;

interface NotifierInterface {
    public function send(string $message): string;
}
