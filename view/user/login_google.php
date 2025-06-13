<?php

// uncomment apabila mengakses file secara langsung
// require '../../config/google-config.php';

$auth_url = $client->createAuthUrl();

$image = 'public/assets/images/google.png';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Login</title>
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

    .google-auth-logo {
      width: 20%;
      height: auto;
      display: block;
      margin: 20px auto;
    }

    .google-auth-title {
      text-align: center;
      font-weight: normal;
      font-size: 1.75em;
      margin-bottom: 0;
    }

    .google-auth-description {
      text-align:center;
      font-size: 0.8em;
      margin-top: 1px;
      margin-bottom: 30px;
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
<body class="google-auth-layout">

  <main class="auth-page">
    <section class="auth-form-container">    

      <img class="google-auth-logo" src="<?= $image ?>" alt="google">
      
      <h1 class="google-auth-title">Silakan Login Google</h1>
      <p class="google-auth-description">untuk melanjutkan ke E-Meeting App</p>

      <button class="btn btn-primary" onclick="location.href='<?= $auth_url ?>';">
        Login Google
      </button>

    </section>
  </main>

</body>
</html>