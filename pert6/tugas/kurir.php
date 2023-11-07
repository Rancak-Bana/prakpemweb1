<?php
$conn = mysqli_connect("localhost", "root", "", "cod");

function tambah($conn){
    if (isset($_POST['btn_tambah'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        if(!empty($id) && !empty($nama) && !is_null($nohp)){
            $sql = "INSERT INTO kurir (id, nama, nohp) VALUES('$id', '$nama', '$nohp')";
            $tambah = mysqli_query($conn, $sql);
            if($tambah && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: kurir.php');
                }
            }
        }
    }
    echo "
    <form method='POST'>
        <h2>Tambah Kurir</h2>
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
                <td>No. HP</td>
                <td><input type='text' name='nohp' /></td>
            </tr>
            <tr>
                <td><input type='submit' name='btn_tambah' value='Tambah' /></td>
                <td><a href='kurir.php'><input type='button' value='Batal'></a></td>
            </tr>
        </table>
    </form>
    ";
}

function tampil($conn){
    $sql = "SELECT * FROM kurir";
    $tampil = mysqli_query($conn, $sql);
    echo "
    <h2>Data Kurir</h2>
    <table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    ";
    while($data = mysqli_fetch_array($tampil)){
        echo "
        <tr>
            <td>$data[id]</td>
            <td>$data[nama]</td>
            <td>$data[nohp]</td>
            <td>
                <a href='kurir.php?aksi=update&id=$data[id]&nama=$data[nama]&nohp=$data[nohp]'>Ubah</a> |
                <a href='kurir.php?aksi=delete&id=$data[id]'>Hapus</a>
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
        $nohp = $_POST['nohp'];
        if(!empty($id) && !empty($nama) && !is_null($nohp)){
            $sql = "UPDATE kurir SET id='$id', nama='$nama', nohp='$nohp' WHERE id='$id'";
            $ubah = mysqli_query($conn, $sql);
            if($ubah && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: kurir.php');
                }
            }
        }
    }
    if(isset($_GET['id'])){
        echo "
        <form method='POST'>
            <h2>Ubah Kurir</h2>
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
                    <td>No. HP</td>
                    <td><input type='text' name='nohp' value='$_GET[nohp]' /></td>
                </tr>
                <tr>
                    <td><input type='submit' name='btn_ubah' value='Ubah' /></td>
                    <td><a href='kurir.php'><input type='button' value='Batal'></a></td>
                </tr>
            </table>
        </form>
        ";
    }
}

function hapus($conn){
    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM kurir WHERE id='$id'";
        $hapus = mysqli_query($conn, $sql);
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                header('location: kurir.php');
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