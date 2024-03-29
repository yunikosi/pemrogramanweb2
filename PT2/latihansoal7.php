<html>
<body>
    <form action="latihansoal7.php" method="post">
        Nama Barang: <input type="text" name="nmbrg"><br>
        Harga Satuan: <input type="text" name="hsbrg"><br>
        Jumlah Barang: <input type="text" name="jmlbrg"><br>
        <input type="submit" value="kirim">
        <input type="reset" value="hapus">
    </form>
</body>
</html>

<?php
$nmbrg = $_POST['nmbrg'];
$hsbrg = $_POST['hsbrg'];
$jmlbrg = $_POST['jmlbrg'];
$harga = $hsbrg * $jmlbrg;

echo "Nama Barang: $nmbrg<br>";
echo "Harga Satuan: Rp. $hsbrg<br>";
echo "Jumlah Barang: $jmlbrg<br>";
echo "Total Harga Barang: Rp. $harga<br>";
?>
