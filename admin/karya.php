<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'karya';

$q = mysqli_query($koneksi, "SELECT * FROM karya ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Karya</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar">
            <h2>Kelola Karya Mahasiswa</h2>
            <a href="tambah_karya.php" class="btn btn-primary btn-sm">+ Tambah Karya</a>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Berhasil disimpan!</div>
        <?php endif; ?>
        <?php if (isset($_GET['hapus'])): ?>
            <div class="alert alert-success">Karya berhasil dihapus.</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>#</th>
                <th>Judul Karya</th>
                <th>Pembuat</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul_karya']) ?></td>
                <td><?= htmlspecialchars($row['nama_pembuat']) ?></td>
                <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                <td>
                    <a href="../detail_karya.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="hapus_karya.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus karya ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>
