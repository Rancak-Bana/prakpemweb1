<?php
session_start();
include 'koneksi.php';

if($_SESSION['username']==""){
    echo "<script>alert('Anda belum login!'); document.location = 'login.php';</script>";
} else {
?>
<h1>Hallo <?= $_SESSION['username'] ?> 👋,</h1>
<h4>Selamat Datang Di Halaman Latihan Belajar Session dan User Authentication!</h4>
<p>Password anda adalah : <?= $_SESSION['password'] ?></p>
<?php
}
?>