<?php
    include"koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form Input</title>
</head>
<body class="bg-info">
    <div class="container-fluid">
        <div class="header col-12 text-center text-white pt-5 pb-5">
            <h3><b>PERTEMUAN 12</b></h3>
            <h4><b>Yuniko Satria Ivantara</b></h4>
            <span>211011400911</span>
        </div>
        <form action="input_kategori.php" method="POST">
        <div class="px-5 text-white col-12 bg-primary py-5 border rounded shadow-sm">
                <h3 class="mb-5 ms-3"><b>FORM TABEL KATEGORI</b></h3>
                <label for="nmkategori" class="ms-3 mb-1">Nama Kategori :</label>
                <input type="text" name="nama_kategori" id="nmkategori" class="form-control ms-3">
                
                <div class="tombol mt-2 d-flex justify-content-end">
                    <button type="reset" class="btn btn-light me-3">Reset</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
        </div>
        </form>
    </div>
    
    <?php 
    
        include"tampil_kategori.php";

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>
</html>