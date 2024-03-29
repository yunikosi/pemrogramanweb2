<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
</head>
<body>
    <h2>Form Buku Tamu</h2>
    <form method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="komentar">Komentar:</label><br>
        <textarea id="komentar" name="komentar" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $komentar = $_POST['komentar'];
        $bukutamu = fopen("bukutamu.dat", "a"); // Membuka file bukutamu.dat untuk ditambahkan (append)
        $data = "$nama|$email|$komentar\n"; // Format data yang akan disimpan dalam file
        fwrite($bukutamu, $data); // Menuliskan data ke dalam file
        fclose($bukutamu); // Menutup file
        echo "<p>Data telah berhasil disimpan.</p>";
    }
    ?>
</body>
</html>
