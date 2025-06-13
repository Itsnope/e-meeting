<?php

// uncomment apabila mengakses file secara langsung
// session_start();
// if (!isset($_SESSION['user_id'])) {
//  header("Location: auth.php?page=login");
//  exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  <h1>Selamat datang, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
  <a href="auth.php?page=logout">Logout</a>
</body>
</html>