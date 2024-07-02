<?php
session_start();
include('koneksi.php');
include('functions.php');

if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

$countries = getCountries($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>UEFA Country Report 2024</title>
    <style>
            p {
        text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php
$current_time = date("d F Y H:i:s");

$text = "<p>Data Group B</p>\n";
$text .= "<p>Per " . $current_time . "</p>\n";
$text .= "<p>211011400911</p>\n";

echo $text;
?>

<table>
    <tr>
        <th>Tim</th>
        <th>Menang</th>
        <th>Seri</th>
        <th>Kalah</th>
        <th>Poin</th>
    </tr>
    <?php while ($row = $countries->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['wins']); ?></td>
        <td><?php echo htmlspecialchars($row['draws']); ?></td>
        <td><?php echo htmlspecialchars($row['losses']); ?></td>
        <td><?php echo htmlspecialchars($row['points']); ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br><br>
<button class="no-print" onclick="window.print()">CETAK</button>
<a href="input_data.php" class="no-print" style="margin-left:40px;">Halaman Input Data</a>
<a href="logout.php" class="no-print" style="margin-left:40px;">Logout</a>

</body>
</html>
