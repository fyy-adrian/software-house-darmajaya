<?php
include 'cek_login.php';
include '../config/koneksi.php';

$id = intval($_GET['id'] ?? 0);

$q = mysqli_query($koneksi, "SELECT gambar FROM karya WHERE id = $id");
$row = mysqli_fetch_assoc($q);
if ($row && $row['gambar'] && file_exists("../uploads/karya/" . $row['gambar'])) {
    unlink("../uploads/karya/" . $row['gambar']);
}

mysqli_query($koneksi, "DELETE FROM karya WHERE id = $id");
header("Location: karya.php?hapus=1");
exit;
?>
