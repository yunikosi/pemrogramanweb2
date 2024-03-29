<?php
$C = 123;
// Variable global

function Test() {
    global $C;
    // Variable lokal

    echo "C pada fungsi berisi = $C \n";
}

Test();
echo "C di luar fungsi berisi = $C \n";
?>
