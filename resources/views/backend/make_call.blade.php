<?php
require ("../vendor/autoload.php");
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = env('TWILIO_ACCOUNT_SID');
$auth_token = env("TWILIO_AUTH_TOKEN");
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with Voice capabilities
$twilio_number = "+16613024159";


// Where to make a voice call (your cell phone?)
$to_number = "+254795339084";

$client = new Client($account_sid, $auth_token);
$client->account->calls->create(
    $to_number,
    $twilio_number,
    array(
        "url" => "http://demo.twilio.com/docs/voice.xml"
    )
);
