<?php
session_start();
include("koneksi.php");
$id = $_GET['id'];
$stmt = mysqli_query($conn, "DELETE FROM posts WHERE id=$id");
header("Location:index.php");
?>