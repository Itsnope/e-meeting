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
</head>
<body>
  <a href="app.php?page=add_meeting">Tambah</a>
  <table border="1">
    <tr>
      <th>Judul</th>
      <th>Awal Meeting</th>
      <th>Akhir Meeting</th>
      <th>Lokasi</th>
      <th>Aksi</th>
    </tr>
    <?php
    // Loop melalui setiap baris hasil query dan tampilkan di tabel
    while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['start_date']) ?></td>
        <td><?= htmlspecialchars($row['end_date']) ?></td>
        <td><?= htmlspecialchars($row['location']) ?></td>
        <td>
          <a href="app.php?page=edit_meeting&id=<?= htmlspecialchars($row['id']) ?>">Edit</a> |
          <a href="app.php?page=delete_meeting&id=<?= htmlspecialchars($row['id']) ?>">Hapus</a> |
          <a href="app.php?page=sync_google_calendar&id=<?= htmlspecialchars($row['id']) ?>">Sync</a>
        </td>
      </tr>
    <?php 
    } 
    ?>
  </table>
</body>
</html>