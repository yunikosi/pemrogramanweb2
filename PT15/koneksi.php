<?php
$host = 'localhost';
$dbname = 'news_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
