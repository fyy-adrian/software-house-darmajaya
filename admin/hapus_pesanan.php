<?php
include 'cek_login.php';
include '../config/koneksi.php';

$id = intval($_GET['id'] ?? 0);
mysqli_query($koneksi, "DELETE FROM pesanan_web WHERE id = $id");
header("Location: pesanan.php?hapus=1");
exit;
?>