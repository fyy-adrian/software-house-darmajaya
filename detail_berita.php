<?php
include 'config/koneksi.php';
$id = intval($_GET['id'] ?? 0);
$q = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$berita = mysqli_fetch_assoc($q);
if (!$berita) { die("Berita tidak ditemukan. <a href='berita.php'>Kembali</a>"); }
$gambar = $berita['gambar'] ? 'uploads/berita/' . $berita['gambar'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($berita['judul']) ?></title>
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
    <h2 style="text-align:left;"><?= htmlspecialchars($berita['judul']) ?></h2>
    <p style="color:#9ca3af;margin-bottom:20px;"><?= date('d M Y H:i', strtotime($berita['tanggal'])) ?></p>
    <?php if ($gambar): ?>
        <img src="<?= htmlspecialchars($gambar) ?>" style="width:100%;border-radius:12px;margin-bottom:20px;">
    <?php endif; ?>
    <p style="white-space:pre-line;"><?= htmlspecialchars($berita['isi']) ?></p>
    <br>
    <a href="berita.php" class="btn btn-primary" style="background:var(--primary);color:#fff;">&larr; Kembali ke Berita</a>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>
