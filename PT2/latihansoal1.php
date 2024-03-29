<?php
$A = 123;
// Variable global

function Test() {
    $A = "Test";
    // Variable lokal

    echo "Variabel A berisi = $A \n";
}

Test();
echo "A diluar fungsi berisi = $A \n";
?>
