<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'dokumentasi';

$q = mysqli_query($koneksi, "SELECT * FROM dokumentasi ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Dokumentasi</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar">
            <h2>Kelola Dokumentasi & Pengumuman</h2>
            <a href="tambah_dokumentasi.php" class="btn btn-primary btn-sm">+ Tambah Dokumentasi</a>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Berhasil disimpan!</div>
        <?php endif; ?>
        <?php if (isset($_GET['hapus'])): ?>
            <div class="alert alert-success">Dokumentasi berhasil dihapus.</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>File</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['file']) ?></td>
                <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                <td>
                    <a href="../uploads/dokumentasi/<?= htmlspecialchars($row['file']) ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="hapus_dokumentasi.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus dokumentasi ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>