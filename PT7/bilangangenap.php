<!DOCTYPE html>
<html>
<head>
    <title>PT4 SOAL 2</title>
</head>
<body>
    <h2>Masukkan Nilai Awal dan Nilai Akhir</h2>
    <form method="post">
        <label for="nilai_awal">Nilai Awal:</label>
        <input type="number" id="nilai_awal" name="nilai_awal" required><br><br>
        <label for="nilai_akhir">Nilai Akhir:</label>
        <input type="number" id="nilai_akhir" name="nilai_akhir" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nilai_awal = $_POST['nilai_awal'];
        $nilai_akhir = $_POST['nilai_akhir'];
        $deret = array_filter(range($nilai_awal, $nilai_akhir), fn($x) => $x % 2 != 0 && $x % 3 == 0);
        $total = array_sum($deret);
        echo "<h2>Deret bilangan ganjil yang habis dibagi 3 dari $nilai_awal sampai $nilai_akhir:</h2>";
        echo "<p>Banyaknya deret bilangan: " . count($deret) . "</p>";
        echo "<p>Deret bilangan: " . implode(', ', $deret) . "<br>";
        echo "Jumlah dari deret bilangan: $total</p>";
    }
    ?>
</body>
</html>