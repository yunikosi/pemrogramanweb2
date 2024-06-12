<title>Yuniko Satria I 211011400911</title>
<pre>
    NO 2

    Contoh 2 : Access Denied
    Solusi   : Sesuaikan username dan pasword
               ( Fatal error: Uncaught mysqli_sql_exception: Access denied for user 'username'@'localhost' (using password: NO)  )
</pre>


<?php
$server = "localhost";
$username = "username";
$password = "";
$db = "handle_error";


$koneksi = new mysqli($server, $username, $password, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
echo "Koneksi berhasil";
?>