<?php
include 'config/koneksi.php';
$id = intval($_GET['id'] ?? 0);
$q = mysqli_query($koneksi, "SELECT * FROM karya WHERE id = $id");
$karya = mysqli_fetch_assoc($q);
if (!$karya) { die("Karya tidak ditemukan. <a href='karya.php'>Kembali</a>"); }
$gambar = $karya['gambar'] ? 'uploads/karya/' . $karya['gambar'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($karya['judul_karya']) ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo"><span class="mark">SC</span>Study<span>Club</span></div>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="berita.php">Berita</a></li>
        <li><a href="karya.php">Karya Mahasiswa</a></li>
        <li><a href="daftar.php">Daftar Anggota</a></li>
    </ul>
</nav>

<section class="section" style="max-width:800px;margin:0 auto;">
    <h2 style="text-align:left;"><?= htmlspecialchars($karya['judul_karya']) ?></h2>
    <p style="color:#9ca3af;margin-bottom:20px;">Oleh: <?= htmlspecialchars($karya['nama_pembuat']) ?> &middot; <?= date('d M Y', strtotime($karya['tanggal'])) ?></p>
    <?php if ($gambar): ?>
        <img src="<?= htmlspecialchars($gambar) ?>" style="width:100%;border-radius:12px;margin-bottom:20px;">
    <?php endif; ?>
    <p style="white-space:pre-line;"><?= htmlspecialchars($karya['deskripsi']) ?></p>
    <?php if (!empty($karya['link_demo'])): ?>
        <p style="margin-top:16px;"><a href="<?= htmlspecialchars($karya['link_demo']) ?>" target="_blank" class="btn btn-primary" style="background:var(--primary);color:#fff;">Lihat Demo / Link Karya</a></p>
    <?php endif; ?>
    <br>
    <a href="karya.php" class="btn btn-primary" style="background:var(--primary);color:#fff;">&larr; Kembali ke Karya</a>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>
