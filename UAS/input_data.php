<?php
session_start();
include('koneksi.php');
include('functions.php');



if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['grup'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "INSERT INTO countries (name, wins, draws, losses, points, group_id) VALUES ('$country', '$wins', '$draws', '$losses', '$points', '$group_id')";
    $conn->query($sql);
}

$groups = getGroups($conn);
$countries = getCountries($conn);
?>

<style>
    p {
        text-align: center;
    }
    table {
        margin:auto;
        margin-bottom: 30px;
    }
    a {
        text-decoration: none;
    }
</style>
<form method="post" action="input_data.php">
    Group:
    <select name="grup">
        <?php while ($row = $groups->fetch_assoc()): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
    </select><br>

    Country: <select name="country" id="namaNegara">
        <option value="Spanyol">Spanyol</option>
        <option value="Kroasia">Kroasia</option>
        <option value="Albania">Albania</option>
        <option value="Italia">Italia</option>
    </select><br>
    Wins: <input type="text" name="wins"><br>
    Draws: <input type="text" name="draws"><br>
    Losses: <input type="text" name="losses"><br>
    Points: <input type="text" name="points"><br>
    <input type="submit" value="Submit">
</form>



<?php
$current_time = date("d F Y H:i:s");

$text = "<p>Data Group B</p>\n";
$text .= "<p>Per " . $current_time . "</p>\n";
$text .= "<p>211011400911</p>\n";

echo $text;
?>

<table border="1">
    <tr>
        <th>Tim</th>
        <th>Menang</th>
        <th>Seri</th>
        <th>Kalah</th>
        <th>Poin</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $countries->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['wins']); ?></td>
        <td><?php echo htmlspecialchars($row['draws']); ?></td>
        <td><?php echo htmlspecialchars($row['losses']); ?></td>
        <td><?php echo htmlspecialchars($row['points']); ?></td>
        <td>
            <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete_data.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>


<a href="laporan.php">Buat PDF</a>
<a href="logout.php">Logout</a>
