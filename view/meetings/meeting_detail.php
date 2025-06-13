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
</head>
<body>
  <h2>Detail Jadwal Meeting</h2>

  <p><strong>Judul:</strong> <?= htmlspecialchars($meeting['title']) ?></p>
  <p><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($meeting['description'])) ?></p>
  <p><strong>Waktu Meeting:</strong> <?= date('d F Y, H:i', strtotime($meeting['start_date'])) ?></p>
  <p><strong>Lokasi:</strong> <?= htmlspecialchars($meeting['location']) ?></p>

  <a href="app.php?page=list_meetings">← Kembali ke Daftar Meeting</a>
</body>
</html>