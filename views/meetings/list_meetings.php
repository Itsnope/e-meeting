<?php
require '../../config/db.php';
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
  <table border="1">
    <tr>
      <th>Judul</th>
      <th>Waktu</th>
      <th>Lokasi</th>
      <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) {  ?>
      <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['start_date'] ?></td>
        <td><?= $row['location'] ?></td>
        <td>
          <a href="edit_meeting.php?id=<?= $row['id'] ?>">Edit</a> |
          <a href="delete_meeting.php?id=<?= $row['id'] ?>">Hapus</a> |
          <a href="../google/sync_google_calendar.php?id=<?= $row['id'] ?>">Sync</a> |
          <a href="../google/delete_google_calendar.php?id=<?= $row['id'] ?>">Hapus Google</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>