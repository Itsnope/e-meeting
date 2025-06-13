<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// require '../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['user_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $start_date = $_POST['start_date'];
  $location = $_POST['location'];
  
  $stmt = $conn->prepare("INSERT INTO meetings (user_id, title, description, start_date, location) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $user_id, $title, $description, $start_date, $location);

  if ($stmt->execute()) {
    echo "✅ Jadwal Meeting berhasil disimpan!";
  } else {
    echo "❌ Gagal menyimpan jadwal.";
  }

}

?>