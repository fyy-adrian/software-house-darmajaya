<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'anggota';

$q = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY tanggal_daftar DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pendaftar</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Data Pendaftar Anggota</h2></div>

        <table>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Alasan Gabung</th>
                <th>Tanggal Daftar</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['no_hp']) ?></td>
                <td><?= htmlspecialchars($row['alasan_gabung']) ?></td>
                <td><?= date('d M Y H:i', strtotime($row['tanggal_daftar'])) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>
