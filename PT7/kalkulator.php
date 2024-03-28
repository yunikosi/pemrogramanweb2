<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h3>Kalkulator Sederhana</h3>
    <form method="post" action="">
        <input type="text" name="nilai1" placeholder="Nilai 1">
        <select name="operator">
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">x</option>
            <option value="bagi">/</option>
        </select>
        <input type="text" name="nilai2" placeholder="Nilai 2">
        <input type="submit" name="hitung" value="Hitung">
    </form>
    <?php
    if(isset($_POST['hitung'])) {
        $nilai1 = isset($_POST['nilai1']) ? $_POST['nilai1'] : 0;
        $nilai2 = isset($_POST['nilai2']) ? $_POST['nilai2'] : 0;
        $operator = isset($_POST['operator']) ? $_POST['operator'] : 'tambah';
        $hasil = 0;

        switch($operator) {
            case 'tambah':
                $hasil = $nilai1 + $nilai2;
                break;
            case 'kurang':
                $hasil = $nilai1 - $nilai2;
                break;
            case 'kali':
                $hasil = $nilai1 * $nilai2;
                break;
            case 'bagi':
                if($nilai2 != 0) {
                    $hasil = $nilai1 / $nilai2;
                } else {
                    echo "Pembagian dengan nol tidak dapat dilakukan.";
                }
                break;
        }

        echo "Hasil dari $nilai1 $operator $nilai2 adalah: $hasil";
    }
    ?>
</body>
</html>