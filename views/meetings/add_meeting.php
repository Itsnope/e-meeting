<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Meeting</title>
</head>
<body>
  <form action="../../app/controllers/process_meeting.php" method="POST">
    <label>Judul Meeting:</label>
    <input type="text" name="title" required><br>

    <label>Deskripsi:</label>
    <textarea name="description"></textarea><br>

    <label>Waktu Meeting:</label>
    <input type="datetime-local" name="start_date" required><br>

    <label>Lokasi:</label>
    <input type="text" name="location"><br>

    <button type="submit">Simpan Jadwal</button>
  </form>
</body>
</html>