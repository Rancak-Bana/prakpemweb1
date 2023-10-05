<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'asistensi';

$conn = mysqli_connect($hostname, $username, $password, $db) or die ('Gagal terhubung ke database');
?>