<?php
require '../../config/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM meetings WHERE id = $id");
$meeting = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Meeting</title>
</head>
<body>
  <form action="update_meeting.php" method="POST">
   <input type="hidden" name="id" value="<?= $meeting['id']; ?>">

   <label>Judul Meeting:</label>
   <input type="text" name="title" value="<?= $meeting['title']; ?>">

   <label>Deskripsi:</label>
   <textarea name="description"><?= $meeting['description']; ?></textarea>

   <label>Tanggal & Waktu:</label>
   <input type="datetime-local" name="start_date" value="<?= date('Y-m-d\TH:i', strtotime($meeting['start_date'])); ?>">

   <button type="submit">Simpan Perubahan</button>
  </form>
</body>
</html>