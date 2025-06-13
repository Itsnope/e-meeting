<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// require '../../config/google-config.php';
// require '../../config/db.php';

// ---
## Validasi
// ---

// Validasi access_token (sudah login google atau belum)
if (!isset($_SESSION['access_token'])) {
  die("Error: Silakan login ke Google terlebih dahulu.");
};

// Validasi parameter ID meeting
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Error: Parameter ID tidak valid!");
};


// ---
## Inisialisasi Google Calendar Service
// ---

$client->setAccessToken($_SESSION['access_token']);
$calendarService = new Google_Service_Calendar($client);


// ---
## Ambil Data Meeting dari Database
// ---

$meeting_id = $_GET['id'];

// Gunakan prepared statement untuk query pertama
$stmt = $conn->prepare("SELECT * FROM meetings WHERE id = ?");
$stmt->bind_param("i", $meeting_id);
$stmt->execute();
$result = $stmt->get_result();

// Validasi apakah meeting ditemukan di database
if ($result->num_rows === 0) {
    die("Error: Meeting tidak ditemukan!");
}

// Ini mengambil 1 baris hasil query MySQL dalam bentuk associative array, 
// jadinya $meeting['date_time'] bukan jadi DateTime object
$meeting = $result->fetch_assoc();


// GUEST
if (!empty($meeting['guest'])) {
  $guest = $meeting['guest']; // Ambil dari database
  $guest_list = explode(",", $guest); // Pecah string menjadi array

  // Bersihkan dari spasi (array_map = modifikasi semua isi array sekaligus)
  $guest_list = array_map('trim', $guest_list);

  $attendees = [];// Membuat array kosong bernama $attendees

  // Looping dengan menyimpan data hasil explode terus simpan sementara di $email
  foreach ($guest_list as $email) {
    // ambil $email yg disimpan sementara, terus di bungkus jadi array dgn kunci 'email' dan simpan sebagai array di $attendees
    $attendees[] = ['email' => $email];
  }
} else {
  $attendees = [];
};

// NOTULEN
$notulen = $meeting['notulen'] ?? '';
$attachments = [];

if (!empty($notulen) && strpos($notulen, '/d/') !== false) {
  $urlParts = explode('/d/', $notulen);
  $fileId = explode('/', $urlParts[1])[0];
  $fileUrl = $notulen;

  $attachments[] = new Google_Service_Calendar_EventAttachment([
    'fileId' => $fileId,
    'fileUrl' => $fileUrl,
    'title' => "Notulen - " . $meeting['title'] . ".pdf",
    'mimeType' => 'application/pdf',
  ]);
};

// ---
## Buat Event Google Calendar
// ---

$event = new Google_Service_Calendar_Event([
  'summary' => $meeting['title'],
  'description' => $meeting['description'],
  'start' => [
    'dateTime' => date('Y-m-d\TH:i:s', strtotime($meeting['start_date'])), 
    'timeZone' => 'Asia/Jakarta'],
  'end' => [
    'dateTime' => date('Y-m-d\TH:i:s', strtotime($meeting['end_date'])), 
    'timeZone' => 'Asia/Jakarta'],
  'attendees' => $attendees,
  'location' => $meeting['location'],
  'reminders' => [
    'useDefault' => false,
    'overrides' => [
      [
        'method'=> 'email',
        'minutes'=> 24 * 60
      ],
      [
        'method'=> 'popup',
        'minutes'=> 10
      ],
    ],
  ],
  'conferenceData' => [
    'createRequest' => [
      'requestId' => uniqid()
    ],
  ],
  'attachments' => $attachments

]);

$calendarId = $_ENV['CALENDAR_ID'] ?? 'primary';
$event = $calendarService->events->insert($calendarId, $event, ['conferenceDataVersion' => 1, 'supportsAttachments' => true]);


// ---
## Simpan Google Event ID ke Database
// ---
$stmt = $conn->prepare("UPDATE meetings SET gmeet_link = ?, google_event_id = ? WHERE id = ?");
$stmt->bind_param("ssi", $event->hangoutLink, $event->id, $meeting_id);
$stmt->execute();


// ---
## Tampilkan Hasil
// ---

echo "✅ Jadwal meeting berhasil disinkronisasi & telah dikirim ke Google Calendar : <br />";

echo "<a href='" . htmlspecialchars($event->htmlLink) . "' target=_blank>Lihat Meeting</a>";

?>