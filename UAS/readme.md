// Koneksi untuk ke database

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uefa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


// login.php 

<?php
session_start();
include('koneksi.php');

// Redirect pengguna ke halaman input_data.php jika sudah login
if (isset($_SESSION['nim'])) {
    header("Location: input_data.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE nim = '$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Simpan NIM dalam sesi
            $_SESSION['nim'] = $nim;
            header("Location: input_data.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
