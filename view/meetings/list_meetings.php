<?php

// uncomment apabila mengakses file secara langsung
// require '../../config/db.php';

// ---
## Ambil Data Meeting dari Database
// ---

// Mengambil semua data meeting dari tabel 'meetings' dan mengurutkannya berdasarkan tanggal mulai secara ascending (terlama ke terbaru).
$result = $conn->query("SELECT * FROM meetings ORDER BY start_date ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Meeting</title>
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
    .page-header {
      font-size: 1.5rem;
      max-width: 1000px;
    }
    .meeting-list-container {
      width: 90%;
      display: flex;
      gap: 4px 0;
      flex-direction: column;
      align-items: center;
    }
    .table-actions {
      display: flex;
      justify-content: flex-end;
      width: 100%;
    }
    .table-list {
      width: 100%;
      overflow-x:auto;
    }
    .meetings-table {
      border: 1px solid var(--color-ink);
      width: 100%;
      border-collapse: collapse;
    }
    .table-header {
      background-color: var(--color-primary);
      color: #f2f2f2;
    }
    .table-header-cell {
      border: 2px solid var(--color-ink);
      padding: 10px;
    }
    .table-body {
      background-color: #f9fbfd;
    }
    .table-body-cell {
      border: 2px solid var(--color-ink);
      padding: 10px;
      text-align: center;
    }
    .time-block {
      display: block;
    }
    .action-link {
      text-decoration: none;
      color: var(--color-ink);
    }
    .action-edit:hover {
      color: #00cc99;
    }
    .action-delete:hover {
      color: #e63946;
    }
    .action-sync:hover {
      color: #0099cc;
    }
    .table-body tr:hover {
      background-color: #d0e7f9;
    }
    .table-body > tr:nth-of-type(even) {
      background-color: #e9f2f9;
    }
    .table-body > tr:nth-of-type(even):hover {
      background-color: #c2ddf2;
    }
  </style>
</head>
<body>
  <main class="meeting-page">
    <section class="page-header">
      <h2>List e-Meeting</h2>
    </section>
    <section class="meeting-list-container">
      <div class="table-actions">
        <button>
          <a href="app.php?page=add_meeting">
    
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 15 16">
    
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          
          </svg>
           
          </a>
        </button>
      </div>
      <div class="table-list">
        <table class="meetings-table">
            <thead class="table-header">
              <tr>
                <th class="table-header-cell">Judul</th>
                <th class="table-header-cell">Awal meeting</th>
                <th class="table-header-cell">Akhir meeting</th>
                <th class="table-header-cell">E-mail Guest</th>
                <th class="table-header-cell">Lokasi</th>
                <th class="table-header-cell">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <?php
              while ($row = $result->fetch_assoc()) {
              ?>
                <tr>
                  <td class="table-body-cell"><?= $row['title'];  ?></td>

                  <td  class="table-body-cell"><?= date('d F Y', strtotime($row['start_date']));  ?><span class="time-block"><?= date('H:i', strtotime($row['start_date']));  ?></span></td>

                  <td  class="table-body-cell"><?= date('d F Y', strtotime($row['end_date']));  ?><span class="time-block"><?= date('H:i', strtotime($row['end_date']));  ?></span></td>

                  <td  class="table-body-cell"><?= str_replace(',', ', ', $row['guest']); ?></td>

                  <td  class="table-body-cell"><?= $row['location'];  ?></td>

                  <td  class="table-body-cell">
                    <a class="action-link action-edit" href='app.php?page=edit_meeting&id=<?= $row['id'] ?>'>✏️ Edit</a> 

                    <a class="action-link action-delete" OnClick="return confirm('Yakin ingin menghapus?');" href='app.php?page=delete_meeting&id=<?= $row['id'] ?>'>🗑️ Hapus</a> 

                    <a class="action-link action-sync" href='app.php?page=sync_google_calendar&id=<?= $row['id'] ?>'>🔄 Sync</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>