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
    'end' => htmlspecialchars($row['end_date']),
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

  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'Asia/Jakarta',
      // editable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
        events: <?= json_encode($events) ?>
      });

      calendar.render();
    });

  </script>
  <style>
    .fc-page {
      display: flex;
      width: 100%;
      padding: 20px 0;
      gap: 20px 0;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .page-header {
      font-size: 1.5rem;
      max-width: 1000px;
    }
    .fc-container {
      width: 100%;
      padding: 35px 50px 50px;
      justify-content: center;
      align-items: center;
      font-family: arial, sans-serif;
    }
    #calendar thead tr{
      background-color: var(--color-primary);
      color: var(--color-secondary);
    }
    #calendar tbody {
      background-color: var(--color-secondary);
      color: var(--color-ink);
    }
  </style>
</head>
<body>
  <main class="fc-page">
    <section class="page-header">
      <h2>Calendar e-Meeting</h2>
    </section>
    
    <section class="fc-container">
      <div id="calendar"></div>
    </section>
  </main>
</body>
</html>