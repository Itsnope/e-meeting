<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="auth.php?page=login_process" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>

    <p class="auth-helper-text">Kamu belum memiliki akun? <a class="auth-backlink" href="auth.php?page=register">Registrasi</a></p>
  </form>
</body>
</html>