<?php
require '../../config/db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("DELETE FROM meetings WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Jadwal Meeting berhasil dihapus!";
  } else {
    echo "Gagal menghapus jadwal.";
  }
}
?>