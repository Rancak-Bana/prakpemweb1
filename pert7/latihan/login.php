<?php
session_start();
include 'koneksi.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if($count == 1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "<script>alert('Login berhasil!'); document.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Login gagal!'); document.location = 'login.php';</script>";
    }
}
?>
<h1>Halaman Login User yang Terdaftar!</h1>
<form method="POST" name="login">
    <ul>
        <li>Username <input type="text" name="username"></li>
        <li>Password <input type="password" name="password"></li>
        <li><input type="submit" name="submit" value="Login!"></li>
    </ul>
</form>
<a href="register.php">Buat akun baru!</a>