<?php
require 'koneksi.php';

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM makanan WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        ?>
        <script>
            alert('Data berhasil dihapus!');
            document.location = 'index.php';
        </script>
        <?php
    }
} else {
    $sql = 'SELECT * FROM makanan;';
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Makanan</title>
</head>
<body>
    <h1>Daftar Menu Makanan</h1>
    <p><a href="form.php">Tambah Menu</a></p>
    <?php
    if (mysqli_num_rows($result) == 0) {
    ?>
        <h2>Daftar Kosong!</h2>
    <?php
    } else {
    ?>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Harga (Rp.)</th>
                <th>Aksi</th>
            </tr>
    <?php
    $nomor = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>$nomor</td>
                <td>$row[makanan]</td>
                <td>$row[harga]</td>
                <td>
                    <a href='form.php?id=$row[id]'>Edit</a>
                    <a href='?del=$row[id]'>Hapus</a>
                </td>
            </tr>
        ";
        $nomor++;
    }
    ?>
        </table>
    <?php
    }
    ?>
</body>
</html>