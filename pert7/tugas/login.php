<?php
session_start();

if (isset($_POST['submitusername'])) {
    $username = $_POST['inputusername'];
    $_SESSION['usernames'][] = $username;
    $msgusername = "Username $username berhasil ditambahkan!";
}

if (isset($_POST['submitpassword'])) {
    $password = $_POST['inputpassword'];
    $_SESSION['passwords'][] = $password;
    $msgpassword = "Password berhasil ditambahkan!";
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (in_array($username, $_SESSION['usernames']) && in_array($password, $_SESSION['passwords'])) {
        header("Location: index.php");
        exit;
    } else {
        $gagal = "Username dan password yang Anda masukkan salah!";
    }
}
?>

<h1>Tambahkan Username!</h1>
<form name="tambahusername" method="post">
    <input type="text" name="inputusername" required>
    <input type="submit" name="submitusername" value="Tambah Username">
</form>
<?php if (isset($msgusername)) {
    echo "<p>$msgusername</p>";
} ?>

<h1>Tambahkan Password!</h1>
<form name="tambahpassword" method="post">
    <input type="text" name="inputpassword" required>
    <input type="submit" name="submitpassword" value="Tambah Password">
</form>
<?php if (isset($msgpassword)) {
    echo "<p>$msgpassword</p>";
} ?>

<h1>Silakan Login!</h1>
<table>
    <form name="login" method="post">
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" required></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" required></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Login"></td>
    </tr>
    </form>
</table>
<?php if (isset($gagal)) {
    echo "<p>$gagal</p>";
} ?>