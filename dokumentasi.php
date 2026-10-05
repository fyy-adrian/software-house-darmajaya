<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dokumentasi & Pengumuman - Study Club Software House</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'component\layout\navbar\index.php'; ?>

<section class="section">
    <h2>Dokumentasi & Pengumuman</h2>
    <div class="doc-list">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM dokumentasi ORDER BY tanggal DESC");
        if (mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $ext = strtoupper(pathinfo($row['file'], PATHINFO_EXTENSION));
        ?>
        <div class="doc-item">
            <div class="doc-ext"><?= htmlspecialchars($ext) ?></div>
            <div class="doc-info">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <?php if (!empty($row['deskripsi'])): ?>
                    <p><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                <?php endif; ?>
                <div class="meta"><?= date('d M Y', strtotime($row['tanggal'])) ?></div>
            </div>
            <a href="uploads/dokumentasi/<?= htmlspecialchars($row['file']) ?>" class="btn btn-primary btn-sm" download>Download</a>
        </div>
        <?php endwhile; else: ?>
            <p>Belum ada dokumentasi atau pengumuman.</p>
        <?php endif; ?>
    </div>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>