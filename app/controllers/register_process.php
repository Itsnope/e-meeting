<?php

// uncomment apabila mengakses file secara langsung
// Koneksi ke database
// require '../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

  $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $password);
  
  if ($stmt->execute()) {
    echo "✅ Registrasi berhasil! Silakan <a href='auth.php?page=login_google'>login</a>";
  } else {
    echo "❌ Gagal mendaftar!";
  }
}

?>