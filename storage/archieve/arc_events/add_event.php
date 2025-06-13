<?php

session_start();
require '../../config/google-config.php';

if (!isset($_SESSION['access_token'])) {
  die('Harap login dengan Google!');
}

require_once __DIR__ . '/../../vendor/autoload.php'; // Sesuaikan path Composer autoload
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../'); // Path ke root project
$dotenv->load();

$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);
$event = new Google_Service_Calendar_Event([
  'summary' => 'Rapat E-Meeting',
  'start' => ['dateTime' => '2025-06-18T10:00:00+07:00'],
  'end' => ['dateTime' => '2025-06-18T11:00:00+07:00'],
]);

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
$event = $calendarService->events->insert($calendarId, $event);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Events</title>
</head>
<body>
  <p>  
    ✅ Acara berhasil ditambahkan : <a href="<?= $event->htmlLink; ?>" target="_blank"><?= $event->getSummary() ?></a>
  </p>
</body>
</html>