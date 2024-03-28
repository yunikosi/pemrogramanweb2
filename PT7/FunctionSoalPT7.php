<?php
$option = isset($_POST['option']) ? $_POST['option'] : '';

switch ($option) {
    case '1':
        include 'HitungNilai.php';
        break;
    case '2':
        include 'kalkulator.php';
        break;
    case '3':
        include 'bilangangenap.php';
        break;
    case '4':
        include 'perkalianmatriks.php';
        break;
    default:
        echo "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pilih Program</title>
</head>
<body>
    <h2>Pilih Program</h2>
    <form method="post" action="">
        <label for="option">Pilih program:</label>
        <select name="option" id="option">
            <option value="1">Program Hitung Nilai Akhir dan Grade</option>
            <option value="2">Program Kalkulator Sederhana</option>
            <option value="3">Program Bilangan Genap yang Dapat Dibagi 3</option>
            <option value="4">Program Perkalian Matriks</option>
        </select>
        <input type="submit" name="submit" value="Pilih">
    </form>
</body>
</html>
