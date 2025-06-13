<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Meeting</title>
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
    .meeting-page {
      display: flex;
      width: 100%;
      padding: 20px 0;
      gap: 20px 0;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .text-bold {
      font-weight: bold;
    }
    .page-header {
      font-size: 1.5rem;
      max-width: 1000px;
    }
    .meeting-form-container {
      width: 80%;
      display: flex;
      gap: 25px 0;
      flex-direction: column;
    }

    .input-group {
      margin: 30px 0;
    }

    .row-inputs {
      display: flex;
      gap: 0 30px;
    }

    .input-field {
      display: flex;
      flex-direction: column;
      width: 100%;
      gap: 8px 0;
    }

    .form-input {
      height: 48px;
      font-size: 1rem;
      padding: 10px;
      border: 1px solid var(--color-ink);
      border-radius: 8px;
    }

    .form-textarea {
      padding: 10px;
      border: 1px solid var(--color-ink);
      border-radius: 8px;
    }
    .meeting-actions {
      display: flex;
      justify-content: flex-end;
      gap: 20px;
      margin: 50px 0;
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
<body>

  <main class="meeting-page">
    <section class="page-header">
      <h1>Add e-Meeting</h1>
    </section>
    <section class="meeting-form-container">
      <form action="app.php?page=process_meeting" method="POST">
        <div class="input-group row-inputs">
          <div class="input-field">
            <label for="title">
              Judul Meeting
            </label>
            <input class="form-input" type="text" name="title" id="title" placeholder="Masukkan judul rapat" required>
          </div>
          <div class="input-field">
            <label for="location">
              Lokasi
            </label>
            <input class="form-input" type="text" name="location" id="location" placeholder="Masukkan lokasi rapat">
          </div>
        </div>
        <div class="input-group full-width-input">
          <div class="input-field">
            <label for="description">
              Deskripsi
            </label>
            <textarea class="form-textarea" name="description" id="description" rows="8" placeholder="Jelaskan detail rapat"></textarea>
          </div>
        </div>
        <div class="input-group row-inputs">
          <div class="input-field">
            <label for="start_date">
              Awal Meeting
            </label>
            <input class="form-input" type="datetime-local" name="start_date" id="start_date" required>
          </div>
          <div class="input-field">
            <label for="end_date">
              Akhir Meeting
            </label>
            <input class="form-input" type="datetime-local" name="end_date" id="end_date" required>
          </div>
        </div>
        <div class="input-group full-width-input">
          <div class="input-field">
            <label for="email">
              Guest E-mail
            </label>
            <input class="form-input" type="email" name="guest" id="email" placeholder="Guest E-mail (pisahkan dengan koma jika lebih dari satu)" multiple>
          </div>
        </div>

        <div class="meeting-actions">
          <button class="btn btn-secondary text-bold" onclick="window.location.href='app.php?page=list_meetings';return false;">Batal</button>
          <button class="btn btn-primary text-bold">Buat E-meeting</button>
        </div>
      </form>

    </section>
  </main>

</body>
</html>