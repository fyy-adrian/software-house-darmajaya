<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
    $hp      = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alasan  = mysqli_real_escape_string($koneksi, $_POST['alasan_gabung']);

    $sql = "INSERT INTO anggota (nama_lengkap, nim, jurusan, email, no_hp, alasan_gabung)
            VALUES ('$nama', '$nim', '$jurusan', '$email', '$hp', '$alasan')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar.php?sukses=1");
        exit;
    } else {
        die("Gagal menyimpan data: " . mysqli_error($koneksi));
    }
} else {
    header("Location: daftar.php");
    exit;
}
?>
