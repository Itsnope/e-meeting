<?php
session_start();
require '../../config/db.php';
require '../../config/google-config.php';
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];

// Update database
$conn->query("UPDATE meetings SET title='$title', description='$description', start_date='$start_date' WHERE id=$id");

// Ambil google_event_id dari Google Calendar
$result = $conn->query("SELECT google_event_id FROM meetings WHERE id=$id");
$meeting = $result->fetch_assoc();
$eventId = $meeting['google_event_id'];

// Update event di Google Calendar
$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';

$event = $calendarService->events->get($calendarId, $eventId);
$event->setSummary($title);
$event->setDescription($description);
$event->setStart(new Google_Service_Calendar_EventDateTime(['dateTime' => date('Y-m-d\TH:i:s', strtotime($start_date)), 'timeZone' => 'Asia/Jakarta']));
$event->setEnd(new Google_Service_Calendar_EventDateTime(['dateTime' => date('Y-m-d\TH:i:s', strtotime($start_date . ' +1 hour')), 'timeZone' => 'Asia/Jakarta']));

$calendarService->events->update($calendarId, $eventId, $event);
echo "Jadwal berhasil diperbarui di aplikasi dan Google Calendar.";
?>