<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig(__DIR__ . '/credentials.json');
$client->setRedirectUri('http://localhost/e_meeting/google-callback.php');

// Refresh token
$client->setAccessType('offline'); // penting untuk mendapatkan refresh_token
$client->setPrompt('consent'); // penting agar refresh_token muncul di login kedua dan seterusnya

$client->addScope(Google_Service_Calendar::CALENDAR);

?>