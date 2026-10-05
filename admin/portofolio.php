<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'portofolio';

$q = mysqli_query($koneksi, "SELECT * FROM portofolio_anggota ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Portofolio Anggota</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar">
            <h2>Kelola Portofolio Anggota</h2>
            <a href="tambah_portofolio.php" class="btn btn-primary btn-sm">+ Tambah Portofolio</a>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Berhasil disimpan!</div>
        <?php endif; ?>
        <?php if (isset($_GET['hapus'])): ?>
            <div class="alert alert-success">Data berhasil dihapus.</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Keahlian</th>
                <th>Link</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['keahlian']) ?></td>
                <td><a href="<?= htmlspecialchars($row['link_portofolio']) ?>" target="_blank">Buka</a></td>
                <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                <td>
                    <a href="hapus_portofolio.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>