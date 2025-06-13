<?php
// uncomment apabila mengakses file secara langsung
// require '../../config/db.php';


// ---
## Ambil Data Meeting dari Database
// ---

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
  <form action="app.php?page=update_meeting" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($meeting['id']); ?>">

    <label>Judul Meeting:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($meeting['title']); ?>">

    <label>Lokasi:</label>
    <input type="text" name="location" value="<?= htmlspecialchars($meeting['location']); ?>">
    
    <label>Deskripsi:</label>
    <textarea name="description"><?= htmlspecialchars($meeting['description']); ?></textarea>
    
    <label>Awal Meeting:</label>
    <input type="datetime-local" name="start_date" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($meeting['start_date']))); ?>">
    
    <label>Akhir Meeting:</label>
    <input type="datetime-local" name="end_date" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($meeting['end_date']))); ?>">
   
    <label>Guest E-mail:</label>
    <input type="text" name="guest" value="<?= htmlspecialchars($meeting['guest']); ?>">

   <button type="submit">Simpan Perubahan</button>
  </form>
</body>
</html>