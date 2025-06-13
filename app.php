<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: auth.php");
  exit();
}

require 'config/db.php';
require 'config/google-config.php';



$page_title = 'Dashboard';
$content_page = 'view/user/dashboard.php';

// superglobal variabel (mengembalikan nilai True/False)
$page = isset($_GET['page']) ? $_GET['page'] : '';

// routing ke tiap halaman
$pages = [
  'dashboard' => ['Dashboard', 'view/user/dashboard.php'],
  
  'calendar' => ['Calendar', 'view/user/calendar.php'],

  'process_meeting' => ['Process Meetings', 'app/controllers/process_meeting.php'],

  'add_meeting' => ['Add Meetings', 'view/meetings/add_meeting.php'],
  'delete_meeting' => ['Delete Meetings', 'view/meetings/delete_meeting.php'],
  'edit_meeting' => ['Edit Meetings', 'view/meetings/edit_meeting.php'],
  
  'list_meetings' => ['List Meetings', 'view/meetings/list_meetings.php'],
  'meeting_detail' => ['Meeting Detail', 'view/meetings/meeting_detail.php'],
  'update_meeting' => ['Update Meetings', 'view/meetings/update_meeting.php'],
  
  'sync_google_calendar' => ['Sync Google Calendar', 'view/google/sync_google_calendar.php']
];

// array_key_exists($key, $array) = mencari key didalam array
// contoh : mencari 'calendar' di dalam $pages
if (
  $page && 
  array_key_exists($_GET['page'], $pages)
  ) {
    // mengambil array sesuai susunan([$page_title, $content_page]) dgn menggunakan $pages[$_GET['page']]
  [$page_title, $content_page] = $pages[$_GET['page']];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Meeting | <?php echo $page_title; ?></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {

      --color-background: #F7F6E9;
      
      --color-primary: #2a5d84;
      --color-secondary: #fff;
      --color-ink: #000;
      --color-gray: #808080;

      --btn-color-primary: #2a5d84; /* var(--color-primary) */
      --btn-color-primary-border: #008080;
      --btn-color-primary-text: #fff;

      --btn-color-secondary: #fff;
      --btn-color-secondary-border: #808080;
      --btn-color-secondary-text: #000;

      /* event */
      --fc-event-bg-color: #456789;
      --fc-event-border-color: #456789;
      --fc-event-text-color: #fff;

      --fc-today-bg-color: #D6E0DB;
      --fc-border-color: #E0E0D0;

      /* headertoolbar  */
      --fc-button-text-color: #ffffff; 
      --fc-button-bg-color: #2c3e50;
      --fc-button-border-color: #2c3e50;
      --fc-button-hover-bg-color: #1e2b37;
      --fc-button-hover-border-color: #1a252f;
      --fc-button-active-bg-color: #1a252f;
      --fc-button-active-border-color: #151e27;
    }
    .bg-default {
      background-color: var(--color-background);
    }
    .app-main {
      width: 100%;
      height: auto;
      height: 100vh;
      display: flex;
      flex-grow: 1;
      flex-direction: column;
      overflow: hidden;
    }

    .app-content {
      overflow: auto;
      padding: 10px 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body class="bg-default">
  <main class="app-main">
    <div class="app-header">
      <?php include 'view/layouts/navbar.php'; ?>
    </div>
    <div class="app-content">
      <?php include $content_page; ?>
    </div>
  </main>
</body>
</html>