<?php
$conn = mysqli_connect("localhost", "root", "", "cod");

function panggilTable($conn, $namaTable, $link) {
    $no = 1;
    $tampil = mysqli_query($conn, "SELECT id FROM $namaTable");
    echo "<a href='$link'>
        <table border='1' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>ID $namaTable</th>
            </tr>";
    while ($data = mysqli_fetch_array($tampil)) {
        echo "<tr>
                <td>$no</td>
                <td>$data[id]</td>
            </tr>";
        $no++;
    }
    echo "</table></a>";
}

panggilTable($conn, "Barang", "barang.php");
panggilTable($conn, "Pembeli", "pembeli.php");
panggilTable($conn, "Kurir", "kurir.php");
?>

<style>
    table {
        display: inline-block;
    }
    table:hover {
        background: rgba(0, 0, 0, 0.1);
    }
    a {
        text-decoration: none;
    }
</style>
