<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Berita - Study Club Software House</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'component\layout\navbar\index.php'; ?>

<section class="section">
    <h2>Semua Berita</h2>
    <div class="grid">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
        if (mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/berita/' . $row['gambar'] : 'https://placehold.co/400x200?text=Berita';
        ?>
        <a href="detail_berita.php?id=<?= $row['id'] ?>" class="card">
            <img src="<?= htmlspecialchars($gambar) ?>" alt="berita">
            <div class="card-body">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <p><?= htmlspecialchars(mb_strimwidth($row['isi'], 0, 90, '...')) ?></p>
                <div class="meta"><?= date('d M Y', strtotime($row['tanggal'])) ?></div>
            </div>
        </a>
        <?php endwhile; else: ?>
            <p>Belum ada berita.</p>
        <?php endif; ?>
    </div>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>
