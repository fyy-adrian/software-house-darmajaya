<?php
include 'cek_login.php';
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi   = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $nama_file = "";

    // Proses upload gambar kalau ada
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $folder_upload = "../uploads/berita/";
        $ekstensi = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $ekstensi_diizinkan = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($ekstensi, $ekstensi_diizinkan)) {
            $nama_file = uniqid('berita_') . '.' . $ekstensi;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $folder_upload . $nama_file);
        }
    }

    $sql = "INSERT INTO berita (judul, isi, gambar) VALUES ('$judul', '$isi', '$nama_file')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: berita.php?sukses=1");
        exit;
    } else {
        die("Gagal menyimpan berita: " . mysqli_error($koneksi));
    }
}
?>
