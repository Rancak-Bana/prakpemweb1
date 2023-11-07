<?php
include("koneksi.php");
if (isset($_POST['Submit'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $result = mysqli_query($conn, "INSERT INTO posts(judul,konten) VALUES('$judul','$konten')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert - Berita</title>
</head>
<body>
    <h1>Tambah Post Berita!</h1>
    <a href="index.php">Batal</a>
    <table>
        <form action="insert.php" method="POST">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </form>
    </table>
</body>
</html>