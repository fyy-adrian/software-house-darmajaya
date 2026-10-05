<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'dashboard';

$total_anggota = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM anggota"))['jml'];
$total_berita  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM berita"))['jml'];
$total_karya   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM karya"))['jml'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar">
            <h2>Dashboard</h2>
            <span>Halo, <?= htmlspecialchars($_SESSION['admin_username']) ?> 👋</span>
        </div>

        <div class="grid">
            <div class="card"><div class="card-body">
                <h3>Total Pendaftar</h3>
                <p style="font-size:2rem;font-weight:700;color:var(--primary);"><?= $total_anggota ?></p>
            </div></div>
            <div class="card"><div class="card-body">
                <h3>Total Berita</h3>
                <p style="font-size:2rem;font-weight:700;color:var(--primary);"><?= $total_berita ?></p>
            </div></div>
            <div class="card"><div class="card-body">
                <h3>Total Karya</h3>
                <p style="font-size:2rem;font-weight:700;color:var(--primary);"><?= $total_karya ?></p>
            </div></div>
        </div>
    </div>
</div>
</body>
</html>
