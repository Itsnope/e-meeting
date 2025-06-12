<?php
require '../../config/db.php';
$result = $conn->query("SELECT * FROM meetings");

$events = [];
while ($row = $result->fetch_assoc()) {
  $events[] = [
    'title' => $row['title'],
    'start' => $row['start_date'],
    'url' => 'meeting_detail.php?id=' . $row['id']
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
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      events: <?= json_encode($events) ?>
    });
    calendar.render();
  });
  </script>
</head>
<body>
  <div id="calendar"></div>
</body>
</html>