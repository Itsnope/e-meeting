<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    :root {

      --color-background: #F7F6E9;
      
      --color-primary: #2a5d84;
      --color-secondary: #fff;
      --color-ink: #000;
      --color-gray: #808080;

      --btn-color-primary: #2a5d84; /* var(--color-primary) */
      --btn-color-primary-border: #008080;
      --btn-color-primary-text: #fff;

      --btn-color-secondary: #fff;
      --btn-color-secondary-border: #808080;
      --btn-color-secondary-text: #000;

      /* event */
      --fc-event-bg-color: #456789;
      --fc-event-border-color: #456789;
      --fc-event-text-color: #fff;

      --fc-today-bg-color: #D6E0DB;
      --fc-border-color: #E0E0D0;

      /* headertoolbar  */
      --fc-button-text-color: #ffffff; 
      --fc-button-bg-color: #2c3e50;
      --fc-button-border-color: #2c3e50;
      --fc-button-hover-bg-color: #1e2b37;
      --fc-button-hover-border-color: #1a252f;
      --fc-button-active-bg-color: #1a252f;
      --fc-button-active-border-color: #151e27;
    }
    .auth-page {
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      align-content: center;
    }

    .auth-form-container {
      display: flex;
      flex-direction: column;
      width: 350px;

      background: var(--color-secondary);
      padding:20px 20px;
      border-radius: 8px;
      box-shadow:0px 0px 10px #aaa;
      font-family: sans-serif;
      font-size:.9em;
    }

    .auth-form {
      display: flex;
      flex-direction: column;
      width: 100%;
    }

    .auth-input {
      display: inline-block;
      border: none;
      width:100%;
      border-radius:8px;
      margin: 5px 0px 15px;
      padding:10px;
      box-sizing: border-box;
      background-color: #f4f4f5;
    }

    .auth-input:hover {
      background-color: #E4E4E7;
    }

    .auth-helper-text {
      font-size: 14px;
      margin: 10px 0 0;
    }

    .auth-title {
      text-align: center;
      font-size: 2em;
      color: var(--color-primary);
      padding: 20px 0;
    }

    .auth-backlink {
      text-decoration: none;
      color: var(--color-primary);
      font-weight: bold;
    }

    .auth-backlink:hover  {
      text-decoration: underline;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 15px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      min-width: 100px;
      border-radius: 6px;
      opacity: 0.9;
    }

    .btn-primary {
      background-color: var(--btn-color-primary);
      border: 1px solid var(--btn-color-primary-border);
      color: var(--btn-color-primary-text);
    }

    .btn-secondary {
      background-color: var(--btn-color-secondary);
      border: 1px solid var(--btn-color-secondary-border);
      color: var(--btn-color-secondary-text);
    }

    .btn:hover {
      opacity: 1;
    }

    .btn:active {
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
      transform: translateY(1px);
    }
  </style>
</head>
<body class="register-auth-layout">
  <main class="auth-page">
      <section class="auth-form-container">
        <form  class="auth-form" action="auth.php?page=register_process" method="POST">
          <h1 class="auth-title">Registrasi</h1>
          
          <label for="name">Nama:</label>
          <input class="auth-input" type="text" id="name" name="name" required>
          
          <label for="email">Email:</label>
          <input class="auth-input" type="email" id="email" name="email" required>
          
          <label for="password">Password:</label>
          <input class="auth-input" type="password" id="password" name="password" required>
          
          <button class="btn btn-primary" type="submit">Buat Akun</button>

          <p class="auth-helper-text">Kamu sudah memiliki akun? <a class="auth-backlink" href="auth.php?page=login">Masuk</a></p>

        </form>
      </section>
  </main>
    

</body>
</html>