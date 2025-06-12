<?php
session_start();
require '../../config/google-config.php';

if (!isset($_SESSION['access_token'])) {
  die("Silakan login ke Google.");
}

require_once __DIR__ . '/../../vendor/autoload.php'; // Sesuaikan path Composer autoload
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../'); // Path ke root project
$dotenv->load();

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';

$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);

$events = $calendarService->events->listEvents($calendarId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch Meeting</title>
</head>
<body>
  <h2>Jadwal Meeting di Google Calendar</h2>
  <?php foreach ($events->getItems() as $event) { ?>
    <p>Judul meeting : <strong><?= $event->getSummary() ?></strong></p>
    <p>Waktu mulai : <strong><?= $event->getStart()->getDateTime() ?></strong></p>
    <br />
  <?php } ?>
</body>
</html>