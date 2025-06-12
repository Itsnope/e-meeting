<?php
session_start();
require '../../config/google-config.php';
require '../../config/db.php';

if (!isset($_SESSION['access_token'])) {
  die("Error: Silakan login ke Google terlebih dahulu.");
}

$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);

// Ambil data meeting dari database
$meeting_id = $_GET['id'];
$result = $conn->query("SELECT * FROM meetings WHERE id = $meeting_id");
$meeting = $result->fetch_assoc();

$event = new Google_Service_Calendar_Event([
  'summary' => $meeting['title'],
  'description' => $meeting['description'],
  'start' => ['dateTime' => date('Y-m-d\TH:i:s', strtotime($meeting['start_date'])),
  'timeZone' => 'Asia/Jakarta'],
  'end' => ['dateTime' => date('Y-m-d\TH:i:s', strtotime($meeting['start_date'] . ' +1 hour')),
  'timeZone' => 'Asia/Jakarta'],
  'location' => $meeting['location']
]);

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
$event = $calendarService->events->insert($calendarId, $event);

// Simpan google_event_id ke database
$stmt = $conn->prepare("UPDATE meetings SET google_event_id = ? WHERE id = ?");
$stmt->bind_param("si", $event->id, $meeting_id);
$stmt->execute();

echo "Jadwal meeting berhasil dikirim ke Google Calendar : <br />";

echo "<a href=$event->htmlLink target=_blank>Lihat Meeting</a>";
?>