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
$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
$events = $calendarService->events->listEvents($calendarId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
</head>
<body>
  <?php foreach ($events->getItems() as $event) { ?>
    <p>Judul event : <?= $event->getSummary() ?></p>
    <p>Waktu mulai : <?= $event->getStart()->getDateTime() ?></p>
    <br />
  <?php } ?>
</body>
</html>