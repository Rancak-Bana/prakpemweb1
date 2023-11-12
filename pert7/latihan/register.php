<?php
session_start();
include 'koneksi.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password == $password2){
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $query = mysqli_query($conn, $sql);

        if($query){
            echo "<script>alert('Registrasi berhasil!'); document.location = 'login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!'); document.location = 'register.php';</script>";
        }
    } else {
        echo "<script>alert('Password yang dimasukkan tidak sama!'); document.location = 'register.php';</script>";
    }
}
?>
<h1>Halaman Registrasi Akun Mahasiswa</h1>
<form method="POST" name="register">
    <ul>
        <li>Username<br><input type="text" name="username"></li>
        <li>Password<br><input type="password" name="password"></li>
        <li>Konfirmasi Password<br><input type="password" name="password2"></li>
        <li><input type="submit" name="submit" value="Register!"></li>
    </ul>
</form>
<a href="login.php">Sudah memiliki akun?</a>