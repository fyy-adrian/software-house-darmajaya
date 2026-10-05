<?php
include 'config/koneksi.php';
$id = intval($_GET['id'] ?? 0);
$q = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$berita = $q ? mysqli_fetch_assoc($q) : null;

if (!$berita) {
    http_response_code(404);
    $judul = 'Berita tidak ditemukan';
    include 'components/layout/head.php';
    section_open();
    empty_state('🔍', 'Berita tidak ditemukan', 'Berita yang kamu cari mungkin sudah dihapus atau link-nya salah.', 'berita.php', 'Lihat Semua Berita');
    section_close();
    include 'components/layout/footer.php';
    exit;
}

$gambar = $berita['gambar'] ? 'uploads/berita/' . $berita['gambar'] : null;
$judul = $berita['judul'];
include 'components/layout/head.php';
?>

<?php section_open(); ?>
    <article class="mx-auto max-w-[800px]">
        <h1 class="mb-2 text-left text-[clamp(1.35rem,3.5vw,1.7rem)] font-semibold"><?= htmlspecialchars($berita['judul']) ?></h1>
        <p class="mb-5 text-[#9ca3af]"><?= date('d M Y H:i', strtotime($berita['tanggal'])) ?></p>
        <?php if ($gambar): ?>
            <img src="<?= htmlspecialchars($gambar) ?>" alt="<?= htmlspecialchars($berita['judul']) ?>" class="mb-5 w-full rounded-xl">
        <?php endif; ?>
        <p class="whitespace-pre-line"><?= htmlspecialchars($berita['isi']) ?></p>
        <a href="berita.php" class="<?= ui('btn') ?> mt-6">&larr; Kembali ke Berita</a>
    </article>
<?php section_close(); ?>

<?php include 'components/layout/footer.php'; ?>
