<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// require '../../config/db.php';
// require '../../config/google-config.php';


// ---
## Ambil Data dari Form
// ---

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


// ---
## Update Database
// ---

// Lakukan update data meeting di database berdasarkan ID yang diberikan
$conn->query("UPDATE meetings SET title='$title', description='$description', start_date='$start_date', end_date='$end_date' WHERE id=$id");


// ---
## Ambil Google Event ID dari Database
// ---

// Query untuk mendapatkan google_event_id yang terkait dengan meeting ini
$result = $conn->query("SELECT google_event_id FROM meetings WHERE id=$id");
$meeting = $result->fetch_assoc();
$eventId = $meeting['google_event_id'];


// ---
## Update Event di Google Calendar
// ---

if (!empty($eventId)) {
  
  // Set access token untuk otentikasi dengan Google API
  $client->setAccessToken($_SESSION['access_token']);
  $calendarService = new Google_Service_Calendar($client);
  
  // Tentukan ID kalender yang akan digunakan (default 'primary' jika tidak ada di env)
  $calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
  
  // Ambil event yang sudah ada dari Google Calendar menggunakan eventId
  $event = $calendarService->events->get($calendarId, $eventId);
  
  // Setel ulang detail event dengan data yang diperbarui dari form
  $event->setSummary($title);
  $event->setDescription($description);
  $event->setStart(new Google_Service_Calendar_EventDateTime(['dateTime' => date('Y-m-d\TH:i:s', strtotime($start_date)), 'timeZone' => 'Asia/Jakarta']));
  $event->setEnd(new Google_Service_Calendar_EventDateTime(['dateTime' => date('Y-m-d\TH:i:s', strtotime($end_date)), 'timeZone' => 'Asia/Jakarta']));
  
  // Kirim permintaan update ke Google Calendar
  $calendarService->events->update($calendarId, $eventId, $event);
  
  
  // ---
  ## Tampilkan Pesan Sukses
  // ---
  
  echo "✅ Jadwal berhasil diperbarui di aplikasi dan Google Calendar.";

} else {

  echo "✅ Jadwal berhasil diperbarui di aplikasi.";

}

?>