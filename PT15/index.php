<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] == 'penulis' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    $sql = "INSERT INTO news (title, content, author_id) VALUES ('$title', '$content', $author_id)";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='p-4 border rounded shadow-sm bg-success text-white'>
        Berita berhasil ditambahkan!
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SESSION['role'] == 'admin' && isset($_GET['delete'])) {
    $news_id = $_GET['delete'];

    $sql = "DELETE FROM news WHERE id = $news_id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='p-4 border rounded shadow-sm bg-success text-white'>
        Berita berhasil dihapus!
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Modifikasi query berdasarkan peran
if ($_SESSION['role'] == 'penulis') {
    $author_id = $_SESSION['user_id'];
    $news_query = "SELECT news.id, news.title, news.content, users.username AS author 
                   FROM news 
                   JOIN users ON news.author_id = users.id 
                   WHERE news.author_id = $author_id";
} else {
    $news_query = "SELECT news.id, news.title, news.content, users.username AS author 
                   FROM news 
                   JOIN users ON news.author_id = users.id";
}

$news_result = $conn->query($news_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="p-4">
    <div class="p-4 border rounded shadow-sm mt-3">
        <h1>Selamat Datang, <?= $_SESSION['username']; ?></h1>

        <?php if ($_SESSION['role'] == 'penulis'): ?>
            <h2>Buat Berita Baru</h2>
            <form method="post">
                <label for="judul">JUDUL</label>
                <input type="text" name="title" id="judul" class="form-control" required><br>
                <label for="deskripsi">DESKRIPSI</label>
                <textarea name="content" id="deskripsi" class="form-control" required style="min-height:150px; max-height:150px;"></textarea><br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        <?php endif; ?>

        <h2 class="mt-5 mb-3">Daftar Berita</h2>
        <ul class="list-unstyled">
            <?php while ($news_item = $news_result->fetch_assoc()): ?>
                <li>
                    <h3><?= htmlspecialchars($news_item['title']); ?></h3>
                    <p style="text-align: justify;"><?= nl2br(htmlspecialchars($news_item['content'])); ?></p>
                    <p>Author: <?= htmlspecialchars($news_item['author']); ?></p>
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <a href="index.php?delete=<?= $news_item['id']; ?>" class="btn btn-danger mb-3">Delete</a>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>

        <a href="logout.php" class="text-decoration-none">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>


