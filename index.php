<?php
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Meeting</title>
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

    .text-bold {
      font-weight: bold;
    }

    .index-container {
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .hero-section {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .hero-title {
      color: var(--color-primary);
      font-size: 2.8em; 
      margin-bottom: 0; 
      text-transform: uppercase;
    }

    .hero-subtitle {
      color: #555;
      font-size: 1em;
      margin-top: 0;
    }

    .server-time {
      padding: 30px 0 20px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 15px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      min-width: 100px;
      border-radius: 6px;
      opacity: 0.9;
    }

    .btn-primary {
      background-color: var(--btn-color-primary);
      border: 1px solid var(--btn-color-primary-border);
      color: var(--btn-color-primary-text);
    }

    .btn-secondary {
      background-color: var(--btn-color-secondary);
      border: 1px solid var(--btn-color-secondary-border);
      color: var(--btn-color-secondary-text);
    }

    .btn:hover {
      opacity: 1;
    }

    .btn:active {
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
      transform: translateY(1px);
    }
  </style>
</head>
<body class="bg-default">
  <main class="index-container">
    <section class="hero-section">
      <h1 class="hero-title">Selamat Datang di Aplikasi E-Meeting</h1>
      <p class="hero-subtitle">Ini adalah platform untuk mengatur jadwal meeting dengan Google Calendar API</p>
      <h3  class="server-time">Waktu Server : <?php echo $date->format('d F Y, H:i:s'); ?></h3>
      <button class="btn btn-primary text-bold" onclick="location.href='auth.php?page=login_google';">
        Masuk E-Meeting App
      </button>
    </section>
  </main>
</body>
</html>