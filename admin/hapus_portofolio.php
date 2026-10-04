<?php
include 'cek_login.php';
include '../config/koneksi.php';

$id = intval($_GET['id'] ?? 0);

$q = mysqli_query($koneksi, "SELECT foto FROM portofolio_anggota WHERE id = $id");
$row = mysqli_fetch_assoc($q);
if ($row && $row['foto'] && file_exists("../uploads/portofolio/" . $row['foto'])) {
    unlink("../uploads/portofolio/" . $row['foto']);
}

mysqli_query($koneksi, "DELETE FROM portofolio_anggota WHERE id = $id");
header("Location: portofolio.php?hapus=1");
exit;
?>