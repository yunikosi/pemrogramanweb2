<!DOCTYPE html>
<html>
<head>
    <title>ContohCounter</title>
</head>
<body>
    <?php
    $nama_file = "counter.dat";
    if (file_exists($nama_file)) {
        $berkas1 = fopen($nama_file, "r");
        $pencacah1 = (integer) trim(fgets($berkas1, 255));
        $pencacah1++;
        fclose($berkas1);
    } else {
        $pencacah1 = 1;
    }
    // Simpan pencacah1
    $berkas1 = fopen($nama_file, "w");
    fputs($berkas1, $pencacah1);
    fclose($berkas1);
    // Tulis ke halaman web
    print("Anda pengunjung ke-$pencacah1<br>\n");
    ?>
</body>
</html>
