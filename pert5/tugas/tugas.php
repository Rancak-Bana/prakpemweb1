<?php
$hasil = ""; // init var hasil
if(isset($_POST['operasi'])){ // cek apakah button diklik
    $angka1 = $_POST['angka1']; // ambil nilai angka1
    $angka2 = $_POST['angka2']; // ambil nilai angka2
    $operasi = $_POST['operasi']; // ambil nilai operasi

    if (empty($angka1) || empty($angka2)) {
        // jika angka1 atau angka2 kosong, maka tampilkan alert
        echo '<script>alert("Angka harus diisi!");</script>';
    } else {
        if ($operasi == '+') {
            // jika operasi +, hitung hasilnya dan set button aktif
            $hasil = $angka1 + $angka2;
            $btnaktif = "+";
        } elseif ($operasi == '-') {
            // jika operasi -, hitung hasilnya dan set button aktif
            $hasil = $angka1 - $angka2;
            $btnaktif = "-";
        } elseif ($operasi == '*') {
            // jika operasi *, hitung hasilnya dan set button aktif
            $hasil = $angka1 * $angka2;
            $btnaktif = "*";
        } elseif ($operasi == '/') {
            if ($angka2 != 0) {
                // jika operasi / dan angka2 tidak 0, hitung hasilnya dan set button aktif
                $hasil = $angka1 / $angka2;
                $btnaktif = "/";
            } else {
                // jika operasi / dan angka2 0, maka hasil tidak terdefinisi
                $hasil = "Tidak terdefinisi";
            }
        }
    }
}
?>
<style>
    /* style untuk button aktif */
    button[value="<?= $btnaktif ?>"] {
        background-color: blue;
    }
</style>
<h1>Kalkulator PHP</h1>
<form method="post">
    <table>
        <tr>
            <td>Angka Pertama</td>
            <td>
                <!-- jika nilai angka1 sudah ada, maka tampilkan nilai angka1 -->
                <input name="angka1" type="number" value="<?= isset($_POST['angka1']) ? $_POST['angka1'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Angka Kedua</td>
            <td>
                <!-- jika nilai angka2 sudah ada, maka tampilkan nilai angka2 -->
                <input name="angka2" type="number" value="<?= isset($_POST['angka2']) ? $_POST['angka2'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <!-- button untuk operasi penjumlahan, pengurangan, perkalian, pembagian -->
                <button name="operasi" type="submit" value="+">+</button>
                <button name="operasi" type="submit" value="-">-</button>
                <button name="operasi" type="submit" value="*">*</button>
                <button name="operasi" type="submit" value="/">/</button>
            </td>
        </tr>
        <tr>
            <td>Hasil</td>
            <td>
                <!-- tampikan hasil -->
                <input name="hasil" type="text" value="<?= $hasil ?>" readonly>
            </td>
        </tr>
    </table>
</form>