<html>
    <head>
        <title>Penggunaan IF</title>
    </head>
    <body>
        <form method="post" action="">
            Jumlah Pembelian:
            <input type="text" name="input1"><br><br>
            <input type="submit" value="Tentukan Diskon">
        </form>
        
        <?php
        $totalbeli = $_POST['input1'];
        if (isset($totalbeli)) {
            $totalbeli = intval($totalbeli);
            $pot = 0;
            if ($totalbeli >= 200000)
                $pot = 0.1;
            elseif ($totalbeli >= 100000)
                $pot = 0.05;
            else
                $pot = 0.01;
            $pot = $pot * $totalbeli;
            printf("Jumlah Pembelian=%s<br>", $totalbeli);
            printf("Diskon =%s<br>", $pot);
            printf("Pembayaran=%s<br>", $totalbeli - $pot);
        }
        ?>
    </body>
</html>
