# Aplikasi E-Meeting Sederhana - PHP
Aplikasi E-Meeting sederhana ini dikembangkan menggunakan PHP dengan bantuan XAMPP sebagai local server environment, Google Calendar API, FullCalendar untuk tampilan kalender, serta MySQL sebagai database.

## **Langkah-Langkah Menjalankan Aplikasi**

### **A. Persiapan awal**

1. **Clone repository berikut dengan mengetik di terminal/cmd :**
   ```bash
   git clone https://github.com/Animula-Choragi/Project-1_E-meeting.git
   cd Project-1_E-meeting
   ```

2. **Pindahkan folder Project-1_E-meeting ke xampp/htdocs/**

3. **Konfigurasikan environment variables (.env) dengan menyalin file `.env.example` menjadi `.env`**

4. **Konfigurasikan file config/credentials dengan menyalin file `credentials-example.json` menjadi `credentials.json`**

---

### **B. Setup Library & Database**

1. **Pastikan menginstall composer terlebih dahulu**

2. **Buka terminal/cmd di direktori proyek(misal Project-1_E-meeting) dan jalankan :**
    ```bash
    composer install
    ```

3. **Buka XAMPP dan buat database baru :**  
    ```sql
    CREATE DATABASE e_meeting;
    ```

4. **Buat table meetings & users :**
    ```sql
    CREATE TABLE `meetings` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` int(11) NOT NULL,
      `title` varchar(255) NOT NULL,
      `description` varchar(100) NOT NULL,
      `start_date` datetime NOT NULL,
      `end_date` datetime NOT NULL,
      `guest` varchar(255) NOT NULL,
      `location` varchar(100) NOT NULL,
      `gmeet_link` varchar(100) DEFAULT NULL,
      `notulen` varchar(100) NOT NULL,
      `google_event_id` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `user_id` (`user_id`),
      CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
    ```

    ```sql
    CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(100) NOT NULL,
      `email` varchar(100) NOT NULL,
      `password` varchar(255) NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
    ```
    
---

### **C. Setup Google Cloud Console**

1. **Buka Google Cloud Console ([https://console.cloud.google.com/](https://console.cloud.google.com/))**  

2. **Buat Project Baru, misalnya Project-1_E-meeting**

3. **Aktifkan Google Calendar API di API & Services > Library**

4. **Buat kredensial OAuth 2.0 :**
   - Buka Credentials, dan klik create credentials
   - Pilih OAuth Client ID
   - Konfigurasi Authorized redirect URIs ke google-callback.php, misal:  
     `http://localhost/Project-1_E-meeting/google-callback.php`
   - Download OAuth Client
   - Salin isi hasil download dan tempel di config/credentials.json

5. **Tambahkan Test user :**
   - Buka halaman Google Auth Platform, dan klik Audience.
   - Tambahkan test user dengan mengklik Add users.
   - Isi beberapa email yg akan digunakan untuk melakukan interaksi/tes pada Aplikasi E-Meeting lokal.

---

### **D. Test Run Aplikasi**

1. **Buka XAMPP > Apache > Admin**
2. **Tulis URL yang mengarah ke direktori proyek (misal: http://localhost/Project-1_E-meeting/)**