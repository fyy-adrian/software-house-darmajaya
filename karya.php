<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Karya Mahasiswa - Study Club Software House</title>
<link rel="stylesheet" href="assets/css/style.css?v=2">
</head>
<body>

<?php include 'component\layout\navbar\index.php'; ?>

<section class="section">
    <h2>Karya Mahasiswa</h2>
    <div class="grid">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM karya ORDER BY tanggal DESC");
        if (mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/karya/' . $row['gambar'] : 'https://placehold.co/400x200?text=Karya';
        ?>
        <a href="detail_karya.php?id=<?= $row['id'] ?>" class="card">
            <img src="<?= htmlspecialchars($gambar) ?>" alt="karya">
            <div class="card-body">
                <h3><?= htmlspecialchars($row['judul_karya']) ?></h3>
                <p>Oleh: <?= htmlspecialchars($row['nama_pembuat']) ?></p>
            </div>
        </a>
        <?php endwhile; else: ?>
            <p>Belum ada karya yang diupload.</p>
        <?php endif; ?>
    </div>
</section>
<section class="section">
    <h2>Portofolio Anggota</h2>
    <p style="color:var(--text-muted); max-width:60ch; margin:-20px 0 34px;">
        Kunjungi web portofolio pribadi anggota Study Club untuk lihat karya lengkapnya.
    </p>
    <div class="roster-grid">
        <?php
        $qp = mysqli_query($koneksi, "SELECT * FROM portofolio_anggota ORDER BY tanggal DESC");
        if (mysqli_num_rows($qp) > 0):
            while ($rowp = mysqli_fetch_assoc($qp)):
                $inisial = strtoupper(substr($rowp['nama'], 0, 1));
        ?>
        <div class="roster-card">
            <?php if ($rowp['foto']): ?>
                <img src="uploads/portofolio/<?= htmlspecialchars($rowp['foto']) ?>" alt="<?= htmlspecialchars($rowp['nama']) ?>" class="roster-avatar-img">
            <?php else: ?>
                <div class="roster-avatar"><?= $inisial ?></div>
            <?php endif; ?>
            <h3><?= htmlspecialchars($rowp['nama']) ?></h3>
            <span class="roster-badge"><?= htmlspecialchars($rowp['keahlian']) ?></span>
            <p class="roster-desc"><?= htmlspecialchars($rowp['deskripsi']) ?></p>
            <a href="<?= htmlspecialchars($rowp['link_portofolio']) ?>" target="_blank" class="card-btn" style="display:inline-block;">Lihat Portofolio &rarr;</a>
        </div>
        <?php endwhile; else: ?>
            <p>Belum ada portofolio anggota yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</section>
<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>
