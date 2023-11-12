<?php
session_start();

if (!isset($_SESSION['usernames']) || !isset($_SESSION['passwords'])) {
    header("Location: login.php");
    exit;
}
$timeout = 10;

if (isset($_SESSION['aktif']) && (time() - $_SESSION['aktif'] > $timeout)) {
    session_destroy();
    header("Location: login.php");
    exit;
}
$_SESSION['aktif'] = time();
?>

<h1>Halaman Index</h1>
<p>Selamat datang <b><?= $_SESSION['usernames'][0] ?></b>, Anda berhasil login!</p>

<div id="countdown"></div>

<script>
function start(seconds) {
    var countdownElement = document.getElementById('countdown');
    var interval = setInterval(function() {
        countdownElement.innerHTML = seconds;
        if (seconds <= 0) {
            clearInterval(interval);
            location.reload();
        }
        seconds--;
    }, 1000);
}
start(10);
</script>