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

<form method="post" action="login.php">
    NIM: <input type="text" name="nim" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<p>Belum Punya Akun? <a href="registrasi.php">Registrasi disini</a></p>