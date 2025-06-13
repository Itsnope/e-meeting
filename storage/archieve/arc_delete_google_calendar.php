<?php

session_start();
require '../../config/google-config.php';
require '../../config/db.php';

if (!isset($_SESSION['access_token'])) {
  die("Silakan login ke Google.");
}

$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);

$id = $_GET['id'];

// Ambil google_event_id dari database
$result = $conn->query("SELECT google_event_id FROM meetings WHERE id=$id");
$meeting = $result->fetch_assoc();

// cek eventId di database
if (isset($meeting['google_event_id'])) {
  $eventId = $meeting['google_event_id'];
} else {
  $eventId = null;
};

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';

$calendarService->events->delete($calendarId, $eventId);
echo "✅ Jadwal meeting berhasil dihapus dari Google
Calendar.";

?>