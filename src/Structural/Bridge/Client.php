<?php

namespace Structural\Bridge;

use Structural\Bridge\Implementors\EmailService;
use Structural\Bridge\Implementors\SmsService;
use Structural\Bridge\Abstractions\TextMessage;
use Structural\Bridge\Abstractions\HtmlMessage;

require_once __DIR__ . '/Interfaces/MessagingServiceImplementor.php';
require_once __DIR__ . '/Implementors/EmailService.php';
require_once __DIR__ . '/Implementors/SmsService.php';
require_once __DIR__ . '/Abstractions/Message.php';
require_once __DIR__ . '/Abstractions/TextMessage.php';
require_once __DIR__ . '/Abstractions/HtmlMessage.php';

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
