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
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password for security

    $sql = "INSERT INTO users (nim, password) VALUES ('$nim', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="registrasi.php">
    NIM: <input type="text" name="nim" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

<a href="login.php">Halaman Login</a>