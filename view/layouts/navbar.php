<?php

$user_pict = 'public/assets/images/ccc.jpg';
$logout_pict = 'public/assets/images/logout.png';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .main-header {
      background-color: var(--btn-color-primary);
      width: 100%;
      height: auto;
      font-family: ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      position: relative;
    }
    .main-nav {
      display: flex;
      padding: 10px 20px;
      justify-content: space-between;
      align-items: center;
    }
    .nav-brand {
      font-size: 20px;
      font-weight: bold;
    }
    .brand-link {
      text-decoration: none;
      color: #f2f2f2;
    }
    .nav-item {
      display: inline-block;
      list-style-type: none;
      padding: 8px;
    }
    .nav-link {
      position: relative;
      text-decoration: none;
      color: #f2f2f2;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      opacity: 0.75;
    }
    .nav-link:hover,
    .nav-link:focus {
      opacity: 1;
    }
    .nav-link::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 4px;
      bottom: -8px;
      left: 0;
      background-color: #f8b739;
      opacity: 0;
      transform: scaleX(0);
      transition: 300ms;
    } 
    .nav-link:hover::after,
    .nav-link:focus::after {
      opacity: 1;
      transform: scaleX(1);
    }
    .user-avatar{
      width: 45px;
      border-radius: 50%;
      cursor: pointer;
      margin-left: 30px;
    } 
    .user-dropdown{
      position: absolute;
      top: calc(100% + 5px);
      right: 0.5%;
      width: 190px;
      max-height: 0px;
      overflow: hidden;
      transition: max-height 0.5s;
      font-family: arial, sans-serif;
      z-index: 1001;
    }
    .user-dropdown.open-menu {
      max-height: 400px;
    }
    .dropdown-menu{
      /* border: 2px solid green; */
      background: #456789;
      border-radius: 8px;
      padding: 5px;
      /* margin: 7px 7px; */
    }
    .dropdown-menu:hover {
      background-color: #2c3e50;
    }
    .dropdown-item {
      display: flex;
      align-items: center;
      width: 100%;
      gap: 15px;
      text-decoration: none;
      color: #525252;
      padding: 5px;
    }
    .dropdown-item img{
      width: 30px;
      border-radius: 50%;
      background: var(--color-secondary);
      padding: 4px;
    }
    .dropdown-item p{
      width: 100%;
      font-size: 1em;
      color: var(--color-secondary);
    }
  </style>
</head>
<body>
  <header class="main-header">
    <nav class="main-nav">
      <div class="nav-brand">
        <p><a class="brand-link" href="app.php?page=dashboard">E-Meeting</a></p>
      </div>

      <div class="nav-links-container">
        <ul class="nav-list">
          <li class="nav-item"><a href="app.php?page=calendar" class="nav-link">Calendar</a></li>
          <li class="nav-item"><a href="app.php?page=list_meetings" class="nav-link">List Meeting</a></li>
        </ul>
      </div>

      <div class="user-controls">
        <img src="<?= $user_pict ?>" alt="user" class="user-avatar" onclick="toggleMenu()">
      </div>

      <div class="user-dropdown" id="subMenu">
        <div class="dropdown-menu">
          <a href="auth.php?page=logout" onclick="return confirm('Yakin ingin logout?')" class="dropdown-item">
            <img src="<?= $logout_pict ?>">
            <p>Log out</p>
          </a>
        </div>
      </div>

    </nav>
  </header>

  <script>
    let subMenu = document.getElementById('subMenu');
    function toggleMenu(){
      subMenu.classList.toggle('open-menu')
    }
  </script>
</body>
</html>