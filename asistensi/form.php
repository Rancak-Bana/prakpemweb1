<?php 
    require "koneksi.php";

    $edit = isset($_GET['id']);
    if(isset($_POST['submit'])) {
        $makanan = $_POST['makanan'];
        $harga = $_POST['harga'];
        $sql = '';

        if($edit){
            $id = $_GET['id'];
            $sql = 'update makanan set makanan="$makanan", harga="$harga" where id=$id;';
        } else {
            $sql = 'insert into makanan (makanan, harga) values ("$makanan", "$harga");';
        }

        $result = mysqli_query($conn, $sql);
        if($result){
            ?>
            <script>
                alert('Simpan data berhasil!');
                document.location = 'index.php';
            </script>
            <?php
        } else {
            die("Gagal simpan data");
        }
    }

    if($edit){
        $id = $_GET['id'];
        $sql = 'select * from makanan where id=$id;';
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==0) die("ID makanan tidak ditemukan!");

        $row = mysqli_fetch_assoc($result);
        $makanan = $row['makanan'];
        $harga = $row['harga'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Daftar Menu Makanan</title>
    </head>
    <body>
        <form method="post">
            <label for="makanan">Nama Makanan :</label><br>
            <input type="text" name="makanan" value="<?php if($edit) echo $makanan; ?>"><br>
            <label for="harga">Harga:</label><br>
            <input type="text" name="harga" value="<?php if($edit) echo $harga; ?>"><br>
            <input type="submit" name="submit"value="simpan">
        </form>
    </body>
</html>