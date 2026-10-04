<?php
include 'cek_login.php';
include '../config/koneksi.php';

$id = intval($_GET['id'] ?? 0);

// Hapus file gambar dari folder uploads (kalau ada) sebelum hapus data
$q = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id = $id");
$row = mysqli_fetch_assoc($q);
if ($row && $row['gambar'] && file_exists("../uploads/berita/" . $row['gambar'])) {
    unlink("../uploads/berita/" . $row['gambar']);
}

mysqli_query($koneksi, "DELETE FROM berita WHERE id = $id");
header("Location: berita.php?hapus=1");
exit;
?>
