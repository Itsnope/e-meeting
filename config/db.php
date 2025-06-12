<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Sesuaikan path Composer autoload
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); // Path ke root project
$dotenv->load();

$host = $_ENV['DB_HOST'];     // biasanya localhost
$user = $_ENV['DB_USER'];     // username default XAMPP adalah root
$password = $_ENV['DB_PASS']; // password default XAMPP biasanya kosong
$database = $_ENV['DB_NAME']; // nama database kamu

// Buat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
