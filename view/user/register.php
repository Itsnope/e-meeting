<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
  <form action="auth.php?page=register_process" method="POST">
    <label>Nama:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Daftar</button>

    <p class="auth-helper-text">Kamu sudah memiliki akun? <a href="auth.php?page=login">Masuk</a></p>
  </form>
</body>
</html>