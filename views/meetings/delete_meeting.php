<?php
session_start();
require '../../config/db.php';
require '../../config/google-config.php';
$id = $_GET['id'];

// Ambil event_id dari database
$result = $conn->query("SELECT google_event_id FROM meetings WHERE id=$id");
$meeting = $result->fetch_assoc();
$eventId = $meeting['google_event_id'];


// Hapus dari database
$conn->query("DELETE FROM meetings WHERE id=$id");

// Hapus dari Google Calendar
$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);
$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';

$calendarService->events->delete($calendarId, $eventId);
echo "Jadwal meeting berhasil dihapus dari aplikasi dan
Google Calendar.";
?>