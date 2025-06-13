<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// if (!isset($_SESSION['user_id'])) {
//  header("Location: auth.php?page=login");
//  exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
    .text-bold {
      font-weight: bold;
    }
    .dashboard-page {
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
    .dashboard-section {
      width: 100%;
      padding: 20px 40px;
    }
    .welcome-message{
      border-bottom: 1px solid var(--color-ink);
      margin-bottom: 20px;
      padding-bottom: 20px;
    }
    .welcome-text {
      color: #555;
    }
    .feature-item {
      display:block;
      padding: 10px 0;
    }
    .feature-title {
      text-align: center; 
    }
    .feature-subtitle {
      padding: 20px 10px 5px;
    }
    .feature-description {
      margin-left: 40px;
      color: #555;
    }
    .dashboard-btn-spacing {
      margin: 5px 0 5px 40px;
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
<body>
  <main class="dashboard-page">
    <section class="page-header">
      <h2>Dashboard e-Meeting</h2>
    </section>
    <section class="dashboard-section">

      <div class="welcome-message">

        <h2>Halo, <?php echo $_SESSION['user_name']; ?>!</h2>
        <p class="welcome-text">Selamat datang di e-Meeting, platform untuk mengelola dan menjadwalkan rapat dengan Google Calendar API.</p> 
      
      </div>

      <div class="feature-list">

        <h2 class="feature-title text-bold">Apa yang Bisa Anda Lakukan di Sini?</h2>
        
        <div class="feature-item">
          <h3 class="feature-subtitle">📅 Calendar</h3>
          <p class="feature-description">Lihat seluruh jadwal meeting Anda dalam tampilan kalender interaktif. Dilengkapi fitur klik untuk detail dan filter tampilan (hari/minggu/bulan).</p>
          <button class="btn btn-primary dashboard-btn-spacing" onclick="location.href='app.php?page=calendar';">Buka Kalender</button>
        </div>
        
        <div class="feature-item">
          <h3 class="feature-subtitle">📋 Lihat Jadwal Meeting Terbaru</h3>
          <p class="feature-description">Tampilkan semua daftar rapat yang telah Anda buat dalam bentuk tabel secara real-time.</p>
          <button class="btn btn-primary dashboard-btn-spacing" onclick="location.href='app.php?page=list_meetings';">Lihat Jadwal</button>
        </div>
        
        <div class="feature-item">
          <h3 class="feature-subtitle">✍️ Buat Meeting Baru</h3>
          <p class="feature-description">Ingin menjadwalkan rapat? Klik tombol “Buat Meeting” dan isi informasi yang dibutuhkan.</p>

          <button class="btn btn-primary dashboard-btn-spacing" onclick="location.href='app.php?page=add_meeting';">Buat Meeting</button>
        </div>
        
        <div class="feature-item">
          <h3 class="feature-subtitle">🔔 Pengingat Otomatis</h3>
          <p class="feature-description">Notifikasi akan dikirimkan secara otomatis melalui Google Calendar, jadi Anda tidak akan lupa agenda penting.</p>
        </div>
      </div>

    </section>
  </main>
</body>
</html>