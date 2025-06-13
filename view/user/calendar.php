<?php

// uncomment apabila mengakses file secara langsung
// require '../../config/db.php';

// ---
## Ambil Data Meeting dari Database
// ---

// Mengambil semua data meeting dari tabel 'meetings'.
$result = $conn->query("SELECT * FROM meetings");

$events = [];
// Loop melalui setiap baris hasil query dan format untuk FullCalendar.
while ($row = $result->fetch_assoc()) {
  $events[] = [
    'title' => htmlspecialchars($row['title']),
    'start' => htmlspecialchars($row['start_date']),
    'url' => 'app.php?page=meeting_detail&id=' . htmlspecialchars($row['id'])
  ];
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar</title>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/index.global.min.js"></script>
  <style></style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        events: <?= json_encode($events) ?>
      });
      
      calendar.render(); // Render kalender
    });
  </script>
</head>
<body>
  <div id="calendar"></div>
</body>
</html>