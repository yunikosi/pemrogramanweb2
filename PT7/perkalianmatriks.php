<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 4 - Latihan Soal 2</title>
</head>
<body>
    <h2>Perkalian Matriks</h2>
    <?php

    $matrixA = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
    );


    $matrixB = array(
        array(9, 8, 7),
        array(6, 5, 4),
        array(3, 2, 1)
    );


    $resultMatrix = array();


    for ($i = 0; $i < count($matrixA); $i++) {
        for ($j = 0; $j < count($matrixB[0]); $j++) {
            $resultMatrix[$i][$j] = 0;
            for ($k = 0; $k < count($matrixA[0]); $k++) {
                $resultMatrix[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
            }
        }
    }


    echo "<table border='1'>";
    for ($i = 0; $i < count($resultMatrix); $i++) {
        echo "<tr>";
        for ($j = 0; $j < count($resultMatrix[0]); $j++) {
            echo "<td>" . $resultMatrix[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
