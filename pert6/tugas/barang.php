<?php
$conn = mysqli_connect("localhost", "root", "", "cod");

function tambah($conn){
    if (isset($_POST['btn_tambah'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        if(!empty($id) && !empty($nama) && !is_null($harga)){
            $sql = "INSERT INTO barang (id, nama, harga) VALUES('$id', '$nama', $harga)";
            $simpan = mysqli_query($conn, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: barang.php');
                }
            }
        }
    }
    echo "
    <form method='POST'>
        <h2>Tambah Barang</h2>
        <table>
            <tr>
                <td>ID</td>
                <td><input type='text' name='id' /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type='text' name='nama' /></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type='number' name='harga' /></td>
            </tr>
            <tr>
                <td><input type='submit' name='btn_tambah' value='Tambah' /></td>
                <td><a href='barang.php'><input type='button' value='Batal'></a></td>
            </tr>
        </table>
    </form>
    ";
}

function tampil($conn){
    $sql = "SELECT * FROM barang";
    $tampil = mysqli_query($conn, $sql);
    echo "
    <h2>Data Barang</h2>
    <table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    ";
    while($data = mysqli_fetch_array($tampil)){
        echo "
        <tr>
            <td>$data[id]</td>
            <td>$data[nama]</td>
            <td>$data[harga]</td>
            <td>
                <a href='barang.php?aksi=update&id=$data[id]&nama=$data[nama]&harga=$data[harga]'>Ubah</a> |
                <a href='barang.php?aksi=delete&id=$data[id]'>Hapus</a>
            </td>
        </tr>
        ";
    }
    echo "
    </table>
    <a href='index.php'>Kembali</a>
    ";
}

function ubah($conn){
    if(isset($_POST['btn_ubah'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        if(!empty($id) && !empty($nama) && !is_null($harga)){
            $sql = "UPDATE barang SET id='$id', nama='$nama', harga=$harga WHERE id='$id'";
            $update = mysqli_query($conn, $sql);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: barang.php');
                }
            }
        }
    }
    if(isset($_GET['id'])){
        echo "
        <form method='POST'>
            <h2>Ubah Barang</h2>
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type='text' name='id' value='$_GET[id]' /></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type='text' name='nama' value='$_GET[nama]' /></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type='number' name='harga' value='$_GET[harga]' /></td>
                </tr>
                <tr>
                    <td><input type='submit' name='btn_ubah' value='Ubah' /></td>
                    <td><a href='barang.php'><input type='button' value='Batal'></a></td>
                </tr>
            </table>
        </form>
        ";
    }
}

function hapus($conn){
    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM barang WHERE id='$id'";
        $hapus = mysqli_query($conn, $sql);
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                header('location: barang.php');
            }
        }
    }
}

if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            tambah($conn);
            break;
        case "read":
            tampil($conn);
            break;
        case "update":
            ubah($conn);
            tampil($conn);
            break;
        case "delete":
            hapus($conn);
            break;
    }
} else {
    tambah($conn);
    tampil($conn);
}
?>