<?php
include 'cek_login.php';
include '../config/koneksi.php';

$id = intval($_GET['id'] ?? 0);

// Hapus file dari folder uploads (kalau ada) sebelum hapus data
$q = mysqli_query($koneksi, "SELECT file FROM dokumentasi WHERE id = $id");
$row = mysqli_fetch_assoc($q);
if ($row && $row['file'] && file_exists("../uploads/dokumentasi/" . $row['file'])) {
    unlink("../uploads/dokumentasi/" . $row['file']);
}

mysqli_query($koneksi, "DELETE FROM dokumentasi WHERE id = $id");
header("Location: dokumentasi.php?hapus=1");
exit;
?>