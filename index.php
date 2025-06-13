<?php
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Meeting</title>
</head>
<body>
  <h1>Selamat Datang di Aplikasi E-Meeting</h1>
  <p>Ini adalah platform untuk mengatur jadwal meeting dengan Google Calendar API.</p>
  <p>Waktu Server: <?= date("d F Y, H:i:s") ?></p>
  <button onclick="location.href='auth.php?page=login_google';">
    Masuk E-Meeting
  </button>
</body>
</html>