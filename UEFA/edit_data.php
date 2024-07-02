<?php
session_start();
include('koneksi.php');
include('functions.php');

if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM countries WHERE id = $id";
    $result = $conn->query($sql);
    $country = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "UPDATE countries SET name = '$country', wins = '$wins', draws = '$draws', losses = '$losses', points = '$points' WHERE id = $id";
    $conn->query($sql);
    header("Location: input_data.php");
    exit();
}
?>

<form method="post" action="edit_data.php">
    <input type="hidden" name="id" value="<?php echo $country['id']; ?>">
    Country: <input type="text" name="country" value="<?php echo htmlspecialchars($country['name']); ?>"><br>
    Wins: <input type="text" name="wins" value="<?php echo htmlspecialchars($country['wins']); ?>"><br>
    Draws: <input type="text" name="draws" value="<?php echo htmlspecialchars($country['draws']); ?>"><br>
    Losses: <input type="text" name="losses" value="<?php echo htmlspecialchars($country['losses']); ?>"><br>
    Points: <input type="text" name="points" value="<?php echo htmlspecialchars($country['points']); ?>"><br>
    <input type="submit" value="Update">
</form>