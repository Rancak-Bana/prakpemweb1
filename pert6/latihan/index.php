<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM posts");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
</head>
<body>
    <h1>Post News Ter-Update!</h1>
    <a href="insert.php"><button>Tambah Post</button></a>
    <?php
    $no=1;
    while ($data = mysqli_fetch_array($result)) {
        echo "<h2>".$no.". ".$data['judul']."</h2>";
        echo "<a href='update.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a>";
        echo "<p>".$data['konten']."</p>";
        $no++;
    }
    ?>
</body>
</html>