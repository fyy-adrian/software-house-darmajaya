<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'pesanan';

$q = mysqli_query($koneksi, "SELECT * FROM pesanan_web ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pesanan Website</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Pesanan Jasa Pembuatan Website</h2></div>

        <?php if (isset($_GET['hapus'])): ?>
            <div class="alert alert-success">Pesanan berhasil dihapus.</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Jenis Web</th>
                <th>Deskripsi Kebutuhan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['kontak']) ?></td>
                <td><?= htmlspecialchars($row['jenis_web']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi_kebutuhan']) ?></td>
                <td><?= date('d M Y H:i', strtotime($row['tanggal'])) ?></td>
                <td><a href="hapus_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</body>
</html>