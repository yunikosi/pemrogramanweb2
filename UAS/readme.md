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
untuk login ke aplikasi

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

// logout
Untuk Logout dari aplikasi

<?php
session_start();
session_unset(); 
session_destroy(); 
header("Location: login.php"); 
exit();
?>

// input data
<?php
session_start(); // Memulai sesi untuk mengelola status login pengguna
include('koneksi.php'); // Menyertakan file koneksi database
include('functions.php'); // Menyertakan file yang berisi fungsi-fungsi kustom

// Memeriksa apakah pengguna sudah login dengan memeriksa variabel sesi
if (!isset($_SESSION['nim'])) {
    header("Location: login.php"); // Mengarahkan ke halaman login jika belum login
    exit(); // Keluar dari skrip
}

// Memeriksa apakah formulir dikirim menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir
    $group_id = $_POST['grup'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    // Menyisipkan data negara baru ke dalam tabel countries di database
    $sql = "INSERT INTO countries (name, wins, draws, losses, points, group_id) VALUES ('$country', '$wins', '$draws', '$losses', '$points', '$group_id')";
    $conn->query($sql); // Menjalankan perintah SQL
}

// Mendapatkan daftar grup dan negara dari database menggunakan fungsi yang sudah didefinisikan
$groups = getGroups($conn);
$countries = getCountries($conn);
?>


// untuk tampilkan header Data Group
<?php
$current_time = date("d F Y H:i:s");

$text = "<p>Data Group B</p>\n";
$text .= "<p>Per " . $current_time . "</p>\n";
$text .= "<p>211011400911</p>\n";

echo $text;
?>


// Delete data tim dari countries

<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM countries WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    header("Location: input_data.php");
    exit();
}
?>


// Edit Data

<?php
session_start(); // Memulai sesi untuk mengelola status login pengguna
include('koneksi.php'); // Menyertakan file koneksi database
include('functions.php'); // Menyertakan file yang berisi fungsi-fungsi kustom

// Memeriksa apakah pengguna sudah login dengan memeriksa variabel sesi
if (!isset($_SESSION['nim'])) {
    header("Location: login.php"); // Mengarahkan ke halaman login jika belum login
    exit(); // Keluar dari skrip
}

// Memeriksa apakah ada parameter 'id' di URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mendapatkan 'id' dari URL
    $sql = "SELECT * FROM countries WHERE id = $id"; // Membuat query SQL untuk mengambil data negara berdasarkan 'id'
    $result = $conn->query($sql); // Menjalankan query
    $country = $result->fetch_assoc(); // Mengambil hasil query sebagai array asosiatif
}

// Memeriksa apakah formulir dikirim menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir
    $id = $_POST['id'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    // Membuat query SQL untuk memperbarui data negara berdasarkan 'id'
    $sql = "UPDATE countries SET name = '$country', wins = '$wins', draws = '$draws', losses = '$losses', points = '$points' WHERE id = $id";
    $conn->query($sql); // Menjalankan query
    header("Location: input_data.php"); // Mengarahkan ke halaman input_data.php setelah data diperbarui
    exit(); // Keluar dari skrip
}
?>


// untuk dipanggil nanti ke file lain

<?php
function getGroups($conn) {
    $sql = "SELECT * FROM grup";
    $result = $conn->query($sql);
    return $result;
}

function getCountries($conn) {
    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);
    return $result;
}
?>



