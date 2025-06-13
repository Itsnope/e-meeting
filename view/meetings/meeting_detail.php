<?php

// uncomment apabila mengakses file secara langsung
// require '../config/db.php';

// Cek apakah parameter ID dikirim
if (!isset($_GET['id'])) {
  die("❌ ID meeting tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data dari database
$stmt = $conn->prepare("SELECT * FROM meetings WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data ditemukan
if ($result->num_rows === 0) {
  die("❌ Meeting tidak ditemukan.");
}

$meeting = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meeting Detail</title>
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
    .meeting-page {
      display: flex;
      width: 100%;
      padding: 20px 0;
      gap: 20px 0;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .text-bold {
      font-weight: bold;
    }
    .page-header {
      font-size: 1.5rem;
      max-width: 1000px;
    }
    .meeting-detail-content {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: 15px 0 0;
    }
    .meeting-details {
      display: flex;
      flex-direction: column;
      width: 80%;
    }
    .details-container {
      display: flex;
      flex-direction: column;
      gap: 20px 0;
    }
    .details-row {
      display: flex;
      gap: 0 30px;
    }
    .detail-item {
      display: flex;
      flex-direction: column;
      gap: 10px 0;
      width: 100%;
      border-bottom: 2px solid var(--color-ink);
    }
    .detail-label {
      color: var(--color-gray);
      font-size: 1rem;
      text-transform: uppercase;
    }
    .detail-value {
      font-size: 1.3rem;
      text-align:left;
      letter-spacing: 1px;
    }
    .meeting-actions {
      display: flex;
      justify-content: flex-end;
      gap: 20px;
      margin: 50px 0;
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
  
  <main class="meeting-page">
    <section class="page-header">
      <h2>Meeting Details</h2>
    </section>
    <section class="meeting-detail-content">
      <div class="meeting-details">
        <div class="details-container">
          <div class="details-row">
            <div class="detail-item">
              <label class="detail-label">Judul Meeting</label>
              <p class="detail-value"><?= $meeting['title'] ?></p>
            </div>
            <div class="detail-item">
              <label class="detail-label">Waktu Mulai</label>
              <p class="detail-value"><?= date('d F Y H:i', strtotime($meeting['start_date'])); ?></p>
            </div>
          </div>

          <div class="details-row details-row--reverse">
            <div class="detail-item">
              <label class="detail-label">Deskripsi</label>
              <p class="detail-value"><?= $meeting['description']; ?></p>
            </div>
            <div class="detail-item">
              <label class="detail-label">Waktu Selesai</label>
              <p class="detail-value"><?= date('d F Y H:i', strtotime($meeting['end_date'])); ?></p>
            </div>
          </div>

          <div class="details-row">
            <div class="detail-item">
              <label class="detail-label">Lokasi</label>
              <p class="detail-value"><?= $meeting['location']; ?></p>
            </div>
            <div class="detail-item">
              <label class="detail-label">Guest E-mail</label>
              <p class="detail-value"><?= str_replace(',', ', ', $meeting['guest']); ?></p>
            </div>
          </div>
        </div>
        <div class="meeting-actions">
          <button class="btn btn-secondary text-bold" onclick="window.location.href='app.php?page=calendar';">Kembali</button>
          <button class="btn btn-primary text-bold" onclick="window.location.href='app.php?page=edit_meeting&id=<?= $id ?>';">Edit Meeting</button>
        </div>
      </div>
    </section>
  </main>
  
</body>
</html>