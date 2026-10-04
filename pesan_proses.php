<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kontak    = mysqli_real_escape_string($koneksi, $_POST['kontak']);
    $jenis     = mysqli_real_escape_string($koneksi, $_POST['jenis_web']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_kebutuhan']);

    $sql = "INSERT INTO pesanan_web (nama, kontak, jenis_web, deskripsi_kebutuhan)
            VALUES ('$nama', '$kontak', '$jenis', '$deskripsi')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: pesan.php?sukses=1");
        exit;
    } else {
        die("Gagal menyimpan pesanan: " . mysqli_error($koneksi));
    }
} else {
    header("Location: pesan.php");
    exit;
}
?>