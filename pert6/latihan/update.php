<?php
include("koneksi.php");
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $result = mysqli_query($conn, "UPDATE posts SET judul='$judul',konten='$konten' WHERE id=$id");
    header("Location: index.php");
}
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $judul = $data['judul'];
    $konten = $data['konten'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - Berita</title>
</head>
<body>
    <h1>Edit Post Berita!</h1>
    <a href="index.php">Batal</a>
    <table>
        <form action="update.php" method="POST">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?= $judul ?>"></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" cols="30" rows="10"><?= $konten ?></textarea></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?= $id ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
        </form>
    </table>
</body>
</html>