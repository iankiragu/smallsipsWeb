<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require ("../vendor/autoload.php");

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = env('TWILIO_ACCOUNT_SID');
$token  = env("TWILIO_AUTH_TOKEN");
$number = env('TWILIO_NUMBER');
$twilio = new Client($sid, $token);

$message = $twilio->messages
    ->create("+254795339084", // to
        ["body" => "Alert! I have an emergency",
            "from" => "$number"]
    );
echo "<script>alert('Your SMS has been sent');</script>"
