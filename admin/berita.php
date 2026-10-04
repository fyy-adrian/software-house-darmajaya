<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'berita';

$q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Berita</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar">
            <h2>Kelola Berita</h2>
            <a href="tambah_berita.php" class="btn btn-primary btn-sm">+ Tambah Berita</a>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Berhasil disimpan!</div>
        <?php endif; ?>
        <?php if (isset($_GET['hapus'])): ?>
            <div class="alert alert-success">Berita berhasil dihapus.</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                <td>
                    <a href="../detail_berita.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="hapus_berita.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus berita ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>
