<?php

// Implementor: Defines the interface for all implementation classes.
interface MessagingServiceImplementor
{
    public function sendMessge(string $body): void;
}

// Concrete Implementor A: Email Service
class EmailService implements MessagingServiceImplementor
{
    public function sendMessge(string $body): void
    {
        echo "Sending via Email: '{$body}'\n";
    }
}

// Concrete Implementor B: SMS Service
class SmsService implements MessagingServiceImplementor
{
    public function sendMessge(string $body): void
    {
        echo "Sending via SMS: '{$body}'\n";
    }
}

// Abstraction: The high-level control. It delegates the actual work to the implementor.
abstract class Message
{
    protected MessagingServiceImplementor $messagingService;

    public function __construct(MessagingServiceImplementor $messagingService)
    {
        $this->messagingService = $messagingService;
    }

    abstract public function send(): void;
}

// Refined Abstraction A: A simple text message
class TextMessage extends Message
{
    private string $content;

    public function __construct(string $content, MessagingServiceImplementor $messagingService)
    {
        parent::__construct($messagingService);
        $this->content = $content;
    }

    public function send(): void
    {
        $this->messagingService->sendMessge($this->content);
    }
}

// Refined Abstraction B: An HTML message
class HtmlMessage extends Message
{
    private string $htmlBody;

    public function __construct(string $htmlBody, MessagingServiceImplementor $messagingService)
    {
        parent::__construct($messagingService);
        $this->htmlBody = $htmlBody;
    }

    public function send(): void
    {
        $formattedBody = strip_tags($this->htmlBody);
        $this->messagingService->sendMessge($formattedBody);
    }
}


// Create our implementation objects (the sending services)
$emailService = new EmailService();
$smsService = new SmsService();

// Send a plain text message via Email
$textMessageViaEmail = new TextMessage("Hello, this is a plain text email!", $emailService);
$textMessageViaEmail->send();
// Output: Sending via Email: 'Hello, this is a plain text email!'

echo "--------------------------------\n";

// Send the same plain text message via SMS
$textMessageViaSms = new TextMessage("Hello, this is a plain text SMS!", $smsService);
$textMessageViaSms->send();
// Output: Sending via SMS: 'Hello, this is a plain text SMS!'

echo "--------------------------------\n";

// Send an HTML message via Email
$htmlContent = "<h1>Important Notice</h1><p>Your account will expire soon.</p>";
$htmlMessageViaEmail = new HtmlMessage($htmlContent, $emailService);
$htmlMessageViaEmail->send();
// Output: Sending via Email: 'Important NoticeYour account will expire soon.'

echo "--------------------------------\n";

// Send the same HTML message via SMS (notice the tags are stripped)
$htmlMessageViaSms = new HtmlMessage($htmlContent, $smsService);
$htmlMessageViaSms->send();
// Output: Sending via SMS: 'Important NoticeYour account will expire soon.'

