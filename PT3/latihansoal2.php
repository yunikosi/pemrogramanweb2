<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Akhir dan Grade</title>
</head>
<body>
    <h2>Hitung Nilai Akhir dan Grade</h2>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br><br>
        <label for="matakuliah">Mata Kuliah:</label>
        <input type="text" name="matakuliah" id="matakuliah" required><br><br>
        <label for="kehadiran">Jumlah Kehadiran:</label>
        <input type="number" name="kehadiran" id="kehadiran" required><br><br>
        <label for="tugas">Nilai Tugas:</label>
        <input type="number" name="tugas" id="tugas" required><br><br>
        <label for="uts">Nilai UTS:</label>
        <input type="number" name="uts" id="uts" required><br><br>
        <label for="uas">Nilai UAS:</label>
        <input type="number" name="uas" id="uas" required><br><br>
        <input type="submit" name="hitung" value="Hitung">
    </form>
    <?php
    if(isset($_POST['hitung'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $matakuliah = $_POST['matakuliah'];
        $kehadiran = $_POST['kehadiran'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        // Menghitung Nilai Akhir
        $nilai_akhir = 0.1 * $kehadiran + 0.2 * $tugas + 0.3 * $uts + 0.4 * $uas;

        // Menentukan Grade berdasarkan Nilai Akhir
        if($nilai_akhir >= 80) {
            $grade = 'A';
        } elseif($nilai_akhir >= 70) {
            $grade = 'B';
        } elseif($nilai_akhir >= 60) {
            $grade = 'C';
        } elseif($nilai_akhir >= 50) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        // Menampilkan hasil
        echo "<h3>Hasil Perhitungan</h3>";
        echo "Nama: $nama<br>";
        echo "NIM: $nim<br>";
        echo "Mata Kuliah: $matakuliah<br>";
        echo "Nilai Akhir: $nilai_akhir<br>";
        echo "Grade: $grade<br>";
    }
    ?>
</body>
</html>
