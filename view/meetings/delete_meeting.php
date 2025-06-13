<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// require '../../config/db.php';
// require '../../config/google-config.php';


// ---
## Ambil Event ID dari Database
// ---


$id = $_GET['id'];

// Ambil google_event_id dari database
$result = $conn->query("SELECT google_event_id FROM meetings WHERE id=$id");
$meeting = $result->fetch_assoc();
$eventId = $meeting['google_event_id'];


// ---
## Hapus dari Database
// ---

$conn->query("DELETE FROM meetings WHERE id=$id");


// ---
## Hapus dari Google Calendar (jika ada)
// ---

if (!empty($eventId)) {

  // Set access token untuk otentikasi dengan Google API
  $client->setAccessToken($_SESSION['access_token']);
  $calendarService = new Google_Service_Calendar($client);
  $calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
  
  $calendarService->events->delete($calendarId, $eventId);


  // ---
  ## Tampilkan Pesan Sukses
  // ---

  echo "✅ Jadwal meeting berhasil dihapus dari aplikasi dan Google Calendar.";

} else {

  echo "✅ Jadwal meeting berhasil dihapus dari aplikasi";

}

?>